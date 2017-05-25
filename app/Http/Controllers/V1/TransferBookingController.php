<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmedEmail;
use App\TransferBooking;
use App\Place;
use App\Blog;
use App\TransferName;
use App\Transfer;
use App\Car;

class TransferBookingController extends Controller
{
    protected $rules = [
        'trip' => 'required',
        'duration' => 'required',
        'passenger' => 'numeric',
        'pickup_address' => 'required',
        'departure_date' => 'date',
        'departure_date' => 'required',
        'dropoff_address' => 'required',
        'name' => 'required',
        'surname' => 'required',
        'email' => 'email',
        'phone' => 'required'
    ];

    /**
     * Show the form for creating a new resource.
     * @param string $name
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function bookForm(Request $request, $slug, $class)
    {
        $transferNames = TransferName::get();
        $places = Place::get();
        $blogs = Blog::limit(2)->orderBy('id', 'DESC')->get();
        $this->chop_blog($blogs);
        $car = Car::where('cars.class', $class)->first();
        $transfer = Transfer::findBySlug($slug);
        $transfer->transfer_name = $transfer->transfer_name->where('transfer_names.id', $transfer->transfer_name_id)->first();
        $transfer->place = $transfer->place->where('places.id', $transfer->place_id)->first();
        return view('/sites.transferBookings.bookForm', [
            'transfer' =>  $transfer,
            'blogs' => $blogs,
            'transferNames' => $transferNames,
            'places' => $places,
            'car' => $car,
            'confirms' => $request->all()
        ]);
    }

    /**
     * Show the confirmed information.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function confirmation(Request $request)
    {
        $transferNames = TransferName::get();
        $places = Place::get();
        $blogs = Blog::limit(2)->orderBy('id', 'DESC')->get();
        $this->chop_blog($blogs);
        $transfer = Transfer::find($request->id);
        $transfer->transfer_name = $transfer->transfer_name->where('transfer_names.id', $transfer->transfer_name_id)->first();
        $transfer->place = $transfer->place->where('places.id', $transfer->place_id)->first();
        return view('/sites.transferBookings.confirmation', [
            'transfer' =>  $transfer,
            'blogs' => $blogs,
            'transferNames' => $transferNames,
            'places' => $places,
            'register' => $request->all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function complete(Request $request)
    {
        if($request->ajax()) {
            $transferBooking = new TransferBooking;
            $input = $request->all();
            $result = $transferBooking->create($input);
            if($result->id) {
                Mail::to($request->email)
                ->bcc(env('MAIL_FROM_ADDRESS'))
                ->send(new ConfirmedEmail($input));
                if( count(Mail::failures()) > 0 ) {
                    echo 'check error';die;
                    foreach ($Mail::failures as $failure) {
                        echo $failure . '<br>';
                    } die;
                } else {
                    $data = [
                        'success' => true,
                        'message' => 'Thanks you for your confirmation, please check your email about transfered booking.'
                    ];
                    return response()->json($data);
                }
            } else {
                $data = [
                    'success' => true,
                    'message' => 'An error has occured during process, please try again.'
                ];
                return response()->json($data);
            }
        } else {
            echo '404 not found';
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
        // return substr($string, 0, strpos(wordwrap($string, $x), "\n"));
    }
}
