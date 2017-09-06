<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transfer;
use App\Type;
use App\Pickup;
use App\Place;
use App\Blog;
use App\Driver;
use App\Car;
use App\TransferName;
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
        'type_id'          => 'required',
        'transfer_name_id' => 'required',
        'pick_up_id'       => 'required',
        'place_id'         => 'required',
        'title'            => 'required',
        'duration'         => 'required',
        'image_thumb'      => 'required',
        'image_head'       => 'required',
        'blog'             => 'required',
        'fleet'            => 'required',
        'capability'       => 'required',
        'baggage'          => 'required',
        'price'            => 'required',
    ];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	// $transfers = $this->repository->getTransfers();
        $transfers = Transfer::paginate(10);
        $this->getTransferType($transfers);
        $this->getTransferName($transfers);
        $this->getPlaceName($transfers);
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
        $pickups = Pickup::get();
    	$places = Place::get();
        //$blogs = Blog::whereIn('type_id', [3, 4])->get();
        $drivers = Driver::get();
        $transferNames = TransferName::get();
        return view('/admin.transfers.create', [
            'types'         => $types,
            'pickups'       => $pickups,
            'places'        => $places, 
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
        $this->validate($request, $this->rules);
        $path_thumb = str_replace('public/', '', $request->file('image_thumb')->store('/public'));
        $path_head = str_replace('public/', '', $request->file('image_head')->store('/public'));
        $transfer = new Transfer;
        if(empty($request->is_discount)) {
            $request->discount_value = 0;
        }
        $transfer = Transfer::create([
            'type_id'          => $request->type_id, 
            'transfer_name_id' => $request->transfer_name_id,
            'pick_up_id'       => $request->pick_up_id,
            'place_id'         => $request->place_id,
            'title'            => $request->title,
            'duration'         => $request->duration,
            'image_thumb'      => $path_thumb,
            'image_head'       => $path_head, 
            'description'      => $request->description, 
            'blog'             => $request->blog,
            'is_hot'           => $request->is_hot,
            'is_discount'      => $request->is_discount,
            'discount_value'   => $request->discount_value
        ]);
        $lastId = $transfer->id;
        $transfer = Transfer::find($lastId);
        $count = sizeof($request->fleet);
        for($i = 0; $i < $count; $i++)
        {
            $present[$i] = str_replace('public/', '', $request->file('present')[$i]->store('/public'));
            $transfer->cars()->save(
                new Car([
                    'fleet'      => $request->fleet[$i], 
                    'present'    => $present[$i],
                    'capability' => $request->capability[$i],
                    'price'      => $request->price[$i],
                    'baggage'    => $request->baggage[$i],
                    'driver_id'  => $request->driver_id[$i],
                    'active'  => $request->active[$i],
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
        $pick_ups = Pickup::get();
    	$places = Place::get();
    	$blogs = Blog::get();
        $drivers = Driver::get();
        $transferNames = TransferName::get();
    	$transfer = Transfer::find($id);
        $transfer->image_head = explode(',', $transfer->image_head);
        return view('admin.transfers.edit', [
            'transfer' => $transfer, 
            'types' => $types,
            'pick_ups' => $pick_ups,
            'places' => $places, 
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
        if ($request->ajax()) {
            $path_head = str_replace('public/', '', $request->file('image_head')->store('/public'));
            $image_head = explode(',', $transfer->image_head);
            if ($request->flag == 'add') {
                array_push($image_head, $path_head);
                $transfer->update(['image_head' => implode(',', $image_head)]);
                return response()->json([''])
            } else {
                //
            }
        } else {
            if(empty($request->is_discount)) {
                $request->discount_value = 0;
            }
            $transfer->update([
                'type_id'          => $request->type_id,
                'transfer_name_id' => $request->transfer_name_id,
                'pick_up_id'       => $request->pick_up_id,
                'place_id'         => $request->place_id,
                'title'            => $request->title,
                'duration'         => $request->duration,
                'description'      => $request->description,
                'blog'             => $request->blog,
                'is_hot'           => $request->is_hot,
                'is_discount'      => $request->is_discount,
                'discount_value'   => $request->discount_value
            ]);
            if ( ! empty($request->image_thumb)) {
                $path_thumb = str_replace('public/', '', $request->file('image_thumb')->store('/public'));
                $transfer->update([
                    'image_thumb' => $path_thumb,
                ]);
            }

            if ( ! empty($files = $request->file('image_head'))) {
                $images = [];
                foreach ($files as $file) {
                    $path_head = str_replace('public/', '', $file->store('/public'));
                    $images[] = $path_head;
                }
                $transfer->update([
                    'image_head' => implode(',', $images),
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
                    'price'      => $request->price[$i],
                    'baggage'    => $request->baggage[$i],
                    'driver_id'  => $request->driver_id[$i],
                    'active'     => $request->active[$i],
                ]);
                if(! empty($request->present[$i])) {
                    $present[$i] = str_replace('public/', '', $request->file('present')[$i]->store('/public'));
                    $transfer->cars()->where('cars.id', $request->id[$i])->update([
                        'present'    => $present[$i]
                    ]);
                }
            }
            if($new > 0) {

                for($j = 0; $j < $new; $j ++)
                {
                    $present[$i] = str_replace('public/', '', $request->file('present')[$i]->store('/public'));
                    $transfer->cars()->save(
                        new Car([
                            'fleet'      => $request->fleet[$i],
                            'present'    => $present[$i],
                            'capability' => $request->capability[$i],
                            'price'      => $request->price[$i],
                            'baggage'    => $request->baggage[$i],
                            'driver_id'  => $request->driver_id[$i],
                            'active'     => $request->active[$i],
                        ])
                    );
                }
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
            // $transfer->place = $transfer->place->where('id', $transfer->place_id)->first();
        }
    }
}
