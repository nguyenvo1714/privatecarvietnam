<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactInfo;
use App\Transfer;
use App\Type;
use App\Place;
use App\Blog;
use App\Driver;
use App\Car;
use App\TransferName;
use App\CarTransfer;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transfers = Transfer::limit(6)->get();
        $this->getTransferType($transfers);
        $dealTransfers = Transfer::where('is_discount', 1)->get();
        $this->getTransferType($dealTransfers);
        $blogs = Blog::limit(2)->orderBy('id', 'DESC')->get();
        $this->chop_blog($blogs);
        $transferNames = TransferName::get();
        $places = Place::get();
        return view('/sites.index', [
            'transfers' => $transfers,
            'dealTransfers' => $dealTransfers,
            'blogs' => $blogs,
            'transferNames' => $transferNames,
            'places' => $places
        ]);
    }

    /**
     * Display contact form.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        $blogs = Blog::limit(2)->orderBy('id', 'DESC')->get();
        $this->chop_blog($blogs);
        $transferNames = TransferName::get();
        $places = Place::get();
        return view('/sites.transfers.contact', [
            'blogs' => $blogs,
            'transferNames' => $transferNames,
            'places' => $places
        ]);
    }

    /**
     * Send a contac info to admin.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendContact(Request $request)
    {
        if($request->ajax()) {
            $input = $request->all();
            Mail::to(env('MAIL_FROM_ADDRESS'))
                ->send(new ContactInfo($input));
                if( count(Mail::failures()) > 0 ) {
                    echo 'check error';die;
                    foreach ($Mail::failures as $failure) {
                        echo $failure . '<br>';
                    } die;
                } else {
                    $data = [
                        'success' => true,
                        'message' => 'Thanks you for your contact, we will response you soon.'
                    ];
                    return response()->json($data);
                }
        } else {
            $data = [
                'success' => false,
                'message' => 'An error has occured during process, please try again.'
            ];
            return response()->json($data);
        }
    }

    /**
     * Show the record of private transfer.
     *
     * @return \Illuminate\Http\Response
     */
    public function privateTransfer()
    {
        $blogs = Blog::limit(2)->orderBy('id', 'DESC')->get();
        $this->chop_blog($blogs);
        $transferNames = TransferName::get();
        $total = TransferName::where('type_id', 4)->get()->count();
        $perpage = 4;
        $type = 4;
        $total_pages = (int)ceil($total / $perpage);
        $places = Place::get();
        $privateTransfers = TransferName::where('type_id', 4)->limit(4)->get();
        $interestTransfers = Transfer::where('is_hot', 1)->limit(4)->get();
        $this->getTransferType($interestTransfers);
        return view('/sites.transfers.privateTransfers', [
            'privateTransfers' => $privateTransfers,
            'total_pages' => $total_pages,
            'perpage' => $perpage,
            'type' => $type,
            'blogs' => $blogs,
            'transferNames' => $transferNames,
            'places' => $places,
            'interestTransfers' => $interestTransfers
        ]);
    }

    public function transferAjax(Request $request)
    {
        if($request->ajax()) {
            $start = $request->page * $request->perpage;
            $transfers = TransferName::where('type_id', $request->type_id)
                                        ->orderBy('id', 'ASC')
                                        ->offset($start)
                                        ->limit($request->perpage)
                                        ->get();
            if($transfers->count() > 0) {
                $response = [
                    'success' => true,
                    'data' => $transfers
                ];
                return response()->json($response);
            } else {
                $response = [
                    'success' => false,
                    'data' => '404 not found'
                ];
                return response()->json($response);
            }
        } else {
            $response = [
                'success' => false,
                'data' => '404 not found'
            ];
            return response()->json($response);
        }
    }

    /**
     * Show the info of airport transfer.
     *
     * @return \Illuminate\Http\Response
     */
    public function airportTransfer()
    {
        $blogs = Blog::limit(2)->orderBy('id', 'DESC')->get();
        $this->chop_blog($blogs);
        $transferNames = TransferName::get();
        $places = Place::get();
        $total = TransferName::where('type_id', 4)->get()->count();
        $perpage = 4;
        $type = 3;
        $total_pages = (int)ceil($total / $perpage);
        $airportTransfers = TransferName::where('type_id', 3)->limit(4)->get();
        $interestTransfers = Transfer::where('is_hot', 1)->limit(4)->get();
        $this->getTransferType($interestTransfers);
        return view('/sites.transfers.airportTransfers', [
            'airportTransfers' => $airportTransfers,
            'blogs' => $blogs,
            'transferNames' => $transferNames,
            'places' => $places,
            'total_pages' => $total_pages,
            'perpage' => $perpage,
            'type' => $type,
            'interestTransfers' => $interestTransfers
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string $name,
     * @param  int $type_id,
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function viewTransfer($slug)
    {
        $blogs = Blog::limit(2)->orderBy('id', 'DESC')->get();
        $this->chop_blog($blogs);
        $transferNames = TransferName::get();
        $places = Place::get();
        $interestTransfers = Transfer::where('is_hot', 1)->limit(4)->get();
        $this->getTransferType($interestTransfers);
        $transfer_name = TransferName::findBySlug($slug);
        $transfers = Transfer::where('transfer_name_id', $transfer_name->id)->limit(6)->get();
        $total = Transfer::where('transfer_name_id', $transfer_name->id)->get()->count();
        $perpage = 6;
        $total_pages = (int)ceil($total / $perpage);
        $this->getTransferType($transfers);
        return view('/sites.transfers.viewTransfers', [
            'blogs' => $blogs,
            'transferNames' => $transferNames,
            'places' => $places,
            'interestTransfers' => $interestTransfers,
            'transfers' => $transfers,
            'name' => $slug,
            'transfer_name' => $transfer_name,
            'total' => $total,
            'perpage' => $perpage,
            'total_pages' => $total_pages,
        ]);
    }

    public function viewTransferAjax(Request $request)
    {
        if($request->ajax()) {
            $start = $request->page * $request->perpage;
            $transfers = Transfer::where('transfer_name_id', $request->transfer_name_id)
                                        ->orderBy('id', 'ASC')
                                        ->offset($start)
                                        ->limit($request->perpage)
                                        ->get();
            $this->getTransferType($transfers);
            if($transfers->count() > 0) {
                $response = [
                    'success' => true,
                    'data' => $transfers
                ];
                var_dump($transfers);die;
                return response()->json($response);
            } else {
                $response = [
                    'success' => false,
                    'data' => '404 not found'
                ];
                return response()->json($response);
            }
        } else {
            $response = [
                'success' => false,
                'data' => '404 not found'
            ];
            return response()->json($response);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  string $name,
     * @param  int $type_id,
     * @param  int $id,
     * @return \Illuminate\Http\Response
     */
    public function viewAirportTransfer($slug)
    {
        $blogs = Blog::limit(2)->orderBy('id', 'DESC')->get();
        $this->chop_blog($blogs);
        $transferNames = TransferName::get();
        $places = Place::get();
        $interestTransfers = Transfer::where('is_hot', 1)->limit(4)->get();
        $this->getTransferType($interestTransfers);
        $transfer_name = TransferName::findBySlug($slug);
        $transfers = Transfer::where('transfer_name_id', $transfer_name->id)->paginate(6);
        $total = Transfer::where('transfer_name_id', $transfer_name->id)->get()->count();
        $perpage = 6;
        $total_pages = (int)ceil($total / $perpage);
        $this->getTransferType($transfers);
        return view('/sites.transfers.viewAirportTransfers', [
            'blogs' => $blogs,
            'transferNames' => $transferNames,
            'places' => $places,
            'interestTransfers' => $interestTransfers,
            'transfers' => $transfers,
            'name' => $slug,
            'transfer_name' => $transfer_name,
            'total' => $total,
            'perpage' => $perpage,
            'total_pages' => $total_pages,
        ]);
    }

    /**
     * View detail the specified resource.
     *
     * @param  string  $name
     * @param  string  $transferName_id
     * @param  string  $title
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detailTransfer($slug)
    {
        $blogs = Blog::limit(2)->orderBy('id', 'DESC')->get();
        $this->chop_blog($blogs);
        $transferNames = TransferName::get();
        $places = Place::get();
        $interestTransfers = Transfer::where('is_hot', 1)->limit(4)->get();
        $this->getTransferType($interestTransfers);
        $transfer = Transfer::findBySlug($slug);
        $transfer->transfer_name = $transfer->transfer_name->where('transfer_names.id', $transfer->transfer_name_id)->first();
        $transfer->place = $transfer->place->where('places.id', $transfer->place_id)->first();
        $relates = Transfer::where('slug', '<>', $slug)->orderBy('id', 'desc')->limit(3)->get();
        return view('/sites.transfers.detailTransfer', [
            'blogs' => $blogs,
            'transferNames' => $transferNames,
            'places' => $places,
            'interestTransfers' => $interestTransfers,
            'transfer' => $transfer,
            'name' => $slug,
            'relates' => $relates
        ]);
    }

    /**
     * View detail the specified resource.
     *
     * @param  string  $name
     * @param  string  $transferName_id
     * @param  string  $title
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detailAirportTransfer($slug)
    {
        $blogs = Blog::limit(2)->orderBy('id', 'DESC')->get();
        $this->chop_blog($blogs);
        $transferNames = TransferName::get();
        $places = Place::get();
        $interestTransfers = Transfer::where('is_hot', 1)->limit(4)->get();
        $this->getTransferType($interestTransfers);
        $transfer = Transfer::findBySlug($slug);
        $transfer->transfer_name = $transfer->transfer_name->where('transfer_names.id', $transfer->transfer_name_id)->first();
        $transfer->place = $transfer->place->where('places.id', $transfer->place_id)->first();
        $relates = Transfer::where('slug', '<>', $slug)->orderBy('id', 'desc')->limit(3)->get();
        return view('/sites.transfers.detailAirportTransfer', [
            'blogs' => $blogs,
            'transferNames' => $transferNames,
            'places' => $places,
            'interestTransfers' => $interestTransfers,
            'transfer' => $transfer,
            'name' => $slug,
            'relates' => $relates
        ]);
    }

    /**
     * Find a resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function findTransfer(Request $request)
    {
        if($request->ajax()) {
            $transferName = TransferName::where('name', ucwords($request->pickup))->first();
            $place = Place::where('name', ucwords($request->dropoff))->first();
            $transfer = Transfer::where('transfer_name_id', $transferName->id)
                                ->where('place_id', $place->id)->first();
            if($transfer) {
                $type = Type::where('id', $transfer->type_id)->first()->slug;
                $response = [
                    'success' => true,
                    'type' => $type,
                    'slug' => $transfer->slug
                ];
                return response()->json($response);
            } else {
                $response = [
                    'success' => false,
                    'data' => '404 not found'
                ];
                return response()->json($response);
            }
        } else {
            $response = [
                'success' => false,
                'data' => '404 not found'
            ];
            return response()->json($response);
        }
    }

    public function chop_blog($blogs)
    {
        foreach ($blogs as $blog) {
            $blog->description = $this->chop_string($blog->content);
            preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $blog->content, $image);
            foreach ($image as $key => $value) {
                $blog->img = $value;
            }
        }
    }

    public function chop_string($string,$x=100) {
        $string = strip_tags(stripslashes($string)); // convert to plaintext
        return substr($string, 0, $x);
        // return substr($string, 0, strpos(wordwrap($string, $x), "."));
    }

    public function getTransferType($transfers)
    {
        foreach ($transfers as $transfer) {
            $transfer->type = $transfer->type->where('id', $transfer->type_id)->first();
        }
    }

    // public function getCar($transfers)
    // {
    //     foreach ($transfers as $transfer) {
    //         $transfer->cars = $transferswhere('id', $transfer->id)->first();
    //     }
    // }

}
