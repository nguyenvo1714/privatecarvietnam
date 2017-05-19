<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transfer;
use App\Type;
use App\Place;
use App\Blog;
use App\Driver;
use App\Car;
use App\transferName;
use App\Repositories\TransferRepository;
use Illuminate\Support\Facades\DB;

class TransferController extends Controller
{

	protected $repository;

	public function __construct(TransferRepository $repository)
	{
		$this->repository = $repository;
	}

    protected $rules = [
        'type_id'          => 'required|regex:/^[0-9]+/',
        'transfer_name_id' => 'required|regex:/^[0-9]+/',
        'place_id'         => 'required|regex:/^[0-9]+/',
        'title'            => 'required',
        'slug'             => 'required|min:2,max:255|alpha_dash',
        'duration'         => 'required',
        'image_thumb'      => 'required',
        'image_head'       => 'required',
        'blog_id'          => 'required|regex:/^[0-9]+/',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	// $transfers = $this->repository->getTransfers();
        $transfers = Transfer::paginate();
        $this->getTransferType($transfers);
        $this->getTransferName($transfers);
        $this->getPlaceName($transfers);
        $this->getBlogTitle($transfers);
        // foreach ($transfers as $transfer) {
        //     var_dump($transfer->blog_id);
        //     $transferName = $transfer->blog->where('blogs.id', '=', $transfer->blog_id)->first()->title;
            
        //     var_dump($transferName);
        // }
        // die;
        return view('/admin.transfers.index', ['transfers' => $transfers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$types = Type::get();
    	$places = Place::get();
        $blogs = Blog::whereIn('type_id', [3, 4])->get();
        $drivers = Driver::get();
        $transferNames = transferName::get();
        return view('/admin.transfers.create', [
            'types'         => $types, 
            'places'        => $places, 
            'blogs'         => $blogs, 
            'drivers'       => $drivers,
            'transferNames' => $transferNames
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // var_dump($_FILES['image_thumb']['name']);
        $this->validate($request, $this->rules);
        $path_thumb = str_replace('public/', '', $request->file('image_thumb')->store('/public'));
        $path_head = str_replace('public/', '', $request->file('image_head')->store('/public'));
        $transfer = new Transfer;
        if(empty($request->is_discount)) {
            $request->discount_value = 0;
        }
        $transfer = Transfer::create([
            'type_id'          => $request->type_id, 
            'transferName_id'  => $request->transferName_id, 
            'place_id'         => $request->place_id,
            'title'            => $request->title,
            'duration'         => $request->duration,
            'image_thumb'      => $path_thumb,
            'image_head'       => $path_head, 
            'description'      => $request->description, 
            'blog_id'          => $request->blog_id,
            'is_hot'           => $request->is_hot,
            'is_discount'      => $request->is_discount,
            'discount_value'   => $request->discount_value
        ]);
        $lastId = $transfer->id;
        $transfer = Transfer::find($lastId);
        $count = sizeof($request->fleet);
        for($i = 0; $i < $count; $i++)
        {
            $transfer->cars()->save(
                new Car([
                    'fleet'      => $request->fleet[$i], 
                    'capability' => $request->capability[$i],
                    'class'      => $request->class[$i],
                    'price'      => $request->price[$i],
                    'baggage'    => $request->baggage[$i],
                    'driver_id'  => $request->driver_id[$i],
                    'is_active'  => $request->is_active[$i],
                ])
            );
        }
        return redirect('/transfers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.transfers.view', ['transfer' => Transfer::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$types = Type::get();
    	$places = Place::get();
    	$blogs = Blog::get();
        $drivers = Driver::get();
        $transferNames = TransferName::get();
    	$transfer = Transfer::find($id);
        return view('admin.transfers.edit', [
            'transfer' => $transfer, 
            'types' => $types, 
            'places' => $places, 
            'blogs' => $blogs, 
            'cars' => $transfer->cars()->get(), 
            'drivers' => $drivers,
            'transferNames' => $transferNames
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transfer = Transfer::find($id);
        if(empty($request->is_discount)) {
            $request->discount_value = 0;
        }
        $transfer->update([
            'type_id'          => $request->type_id, 
            'transfer_name_id' => $request->transfer_name_id,
            'place_id'         => $request->place_id,
            'title'            => $request->title,
            'duration'         => $request->duration,
            'description'      => $request->description, 
            'blog_id'          => $request->blog_id,
            'is_hot'           => $request->is_hot,
            'is_discount'      => $request->is_discount,
            'discount_value'   => $request->discount_value
        ]);

        if (!empty($request->image_thumb)) {
            $path_thumb = str_replace('public/', '', $request->file('image_thumb')->store('/public'));
            $transfer->update([
                'image_thumb'      => $path_thumb, 
            ]);
        }

        if (!empty($request->image_head)) {
            $path_head = str_replace('public/', '', $request->file('image_head')->store('/public'));
            $transfer->update([
                'image_head'      => $path_head, 
            ]);
        }

        $total = sizeof($request->fleet);
        $old = sizeof($request->id);
        $new = $total - $old;
        for($i = 0; $i < $old; $i++)
        {
            $transfer->cars()->where('cars.id', $request->id[$i])->update([ 
                'fleet'      => $request->fleet[$i],
                'capability' => $request->capability[$i],
                'class'      => $request->class[$i],
                'price'      => $request->price[$i],
                'baggage'    => $request->baggage[$i],
                'driver_id'  => $request->driver_id[$i],
                'is_active'  => $request->is_active[$i],
            ]);
        }
        if($new > 0) {

            for($j = 0; $j < $new; $j ++)
            {
                $transfer->cars()->save(
                    new Car([
                        'fleet'      => $request->fleet[$i], 
                        'capability' => $request->capability[$i],
                        'class'      => $request->class[$i],
                        'price'      => $request->price[$i],
                        'baggage'    => $request->baggage[$i],
                        'driver_id'  => $request->driver_id[$i],
                        'is_active'  => $request->is_active[$i],
                    ])
                );
            }
        } 
        return redirect('/transfers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transfer::find($id)->cars()->delete();
        Transfer::destroy($id);
        return redirect('/transfers');
    }

    public function file() 
    {
        return view('/admin/transfers/file');
    }

    public function upload(Request $request)
    {
        $path = $request->file('image')->storeAs('/public', 'love.jpg');
        var_dump($path);die;
        return $path;
    }

    public function getTransferType($transfers)
    {
        foreach ($transfers as $transfer) {
            $transfer->type = $transfer->type->where('id', $transfer->type_id)->first();
        }
    }

    public function getTransferName($transfers)
    {
        foreach ($transfers as $transfer) {
            $transfer->transfer_name = $transfer->transfer_name->where('id', $transfer->transfer_name_id)->first();
        }
    }

    public function getPlaceName($transfers)
    {
        foreach ($transfers as $transfer) {
            $transfer->place = $transfer->place->where('id', $transfer->place_id)->first();
        }
    }

    public function getBlogTitle($transfers)
    {
        foreach ($transfers as $transfer) {
            $transfer->blog = $transfer->blog->where('id', $transfer->blog_id)->first();
        }
    }
}
