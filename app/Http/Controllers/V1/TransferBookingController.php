<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        'pickupAddress' => 'required',
        'departureDate' => 'date',
        'departureDate' => 'required',
        'dropoffAddress' => 'required',
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
        $blogs = Blog::limit(4)->orderBy('id', 'DESC')->get();
        $car = Car::where('cars.class', $class)->first();
        $transfer = Transfer::findBySlug($slug);
        // $transfers = Transfer::get();
        $transfer->transferName = $transfer->transferName->where('transferNames.id', $transfer->transferName_id)->first();
        $transfer->place = $transfer->place->where('places.id', $transfer->place_id)->first();
        // foreach ($transfers as $key => $value) {
        //     $value->transferNames = TransferName::where('id', $value->transferName_id)->get();
        // }
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
        $blogs = Blog::limit(4)->orderBy('id', 'DESC')->get();
        $transfer = Transfer::find($request->id);
        $transfer->transferName = $transfer->transferName->where('transferNames.id', $transfer->transferName_id)->first();
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
            $result = $transferBooking->create($request->all());
            if($result) {
                $data = [
                    'success' => true,
                    'message' => 'Thanks you for your confirmation, please check your email about transfered booking.'
                ];
                return response()->json($data);
            } else {
                echo 'aaaaaaaa';
                echo 'An error has occured during process';die;
            }
        } else {
            echo 'An error has occured during process';die;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
