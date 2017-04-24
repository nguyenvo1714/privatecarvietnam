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
        return view('/sites.transfers.privateTransfers', [
            'privateTransfers' => $privateTransfers,
            'blogs' => $blogs,
            'transferNames' => $transferNames,
            'places' => $places
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
