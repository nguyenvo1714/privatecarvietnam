<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transfer;
use App\Type;
use App\Place;
use App\Blog;
use App\Driver;
use App\Car;
use App\TransferName;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transfers = Transfer::limit(10)->get();
        $blogs = Blog::limit(4)->get();
        $transferNames = TransferName::get();
        $places = Place::get();
        return view('/sites.index', [
            'transfers' => $transfers,
            'blogs' => $blogs,
            'transferNames' => $transferNames,
            'places' => $places
        ]);
    }

    /**
     * Show the record of private transfer.
     *
     * @return \Illuminate\Http\Response
     */
    public function privateTransfer()
    {
        $blogs = Blog::limit(4)->get();
        $transferNames = TransferName::get();
        $places = Place::get();
        $privateTransfers = TransferName::where('type_id', 4)->get();
        $interestTransfers = Transfer::where('isHot', NULL)->limit(4)->get();
        return view('/sites.transfers.privateTransfers', [
            'privateTransfers' => $privateTransfers,
            'blogs' => $blogs,
            'transferNames' => $transferNames,
            'places' => $places,
            'interestTransfers' => $interestTransfers
        ]);
    }

    /**
     * Show the info of airport transfer.
     *
     * @return \Illuminate\Http\Response
     */
    public function airportTransfer()
    {
        $blogs = Blog::limit(4)->get();
        $transferNames = TransferName::get();
        $places = Place::get();
        $airportTransfers = TransferName::where('type_id', 3)->get();
        $interestTransfers = Transfer::where('isHot', NULL)->limit(4)->get();
        return view('/sites.transfers.airportTransfers', [
            'airportTransfers' => $airportTransfers,
            'blogs' => $blogs,
            'transferNames' => $transferNames,
            'places' => $places,
            'interestTransfers' => $interestTransfers
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string $name,
     * @param  int $type_id,
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function viewTransfer($slug, $transferName_id)
    {
        $blogs = Blog::limit(4)->get();
        $transferNames = TransferName::get();
        $places = Place::get();
        $interestTransfers = Transfer::where('isHot', NULL)->limit(4)->get();
        $transfers = Transfer::where('transferName_id', $transferName_id)->paginate(12);
        return view('/sites.transfers.viewTransfers', [
            'blogs' => $blogs,
            'transferNames' => $transferNames,
            'places' => $places,
            'interestTransfers' => $interestTransfers,
            'transfers' => $transfers,
            'name' => $slug
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string $name,
     * @param  int $type_id,
     * @param  int $id,
     * @return \Illuminate\Http\Response
     */
    public function viewAirportTransfer($slug, $transferName_id)
    {
        $blogs = Blog::limit(4)->get();
        $transferNames = TransferName::get();
        $places = Place::get();
        $interestTransfers = Transfer::where('isHot', NULL)->limit(4)->get();
        $transfers = Transfer::where('transferName_id', $transferName_id)->paginate(12);
        return view('/sites.transfers.viewAirportTransfers', [
            'blogs' => $blogs,
            'transferNames' => $transferNames,
            'places' => $places,
            'interestTransfers' => $interestTransfers,
            'transfers' => $transfers,
            'name' => $slug
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
        $blogs = Blog::limit(4)->get();
        $transferNames = TransferName::get();
        $places = Place::get();
        $interestTransfers = Transfer::where('isHot', NULL)->limit(4)->get();
        $transfer = Transfer::findBySlug($slug);
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
        $blogs = Blog::limit(4)->get();
        $transferNames = TransferName::get();
        $places = Place::get();
        $interestTransfers = Transfer::where('isHot', NULL)->limit(4)->get();
        $transfer = Transfer::findBySlug($slug);
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
