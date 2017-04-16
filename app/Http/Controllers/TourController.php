<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Driver;

class TourController extends Controller
{

    protected $rules = [
        'type_id'   => 'required|regex:/^[0-9]+/',
        'name'          => 'required',
        'interval'      => 'required',
        'startDate'     => 'required',
        'endDate'       => 'required',
        'price'         => 'required',
        'program'       => 'required',
        'blog_id'       => 'required|regex:/^[0-9]+/',
        'isDiscount'    => 'required|regex:/^[0-1]{1}/',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::paginate(10);
        return view('/admin.drivers.index', ['drivers' => $drivers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin.drivers.create');
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
        $driver = new Tour;
        $driver->create($request->all());
        return redirect('/drivers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.drivers.view', ['driver' => Driver::findorFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.drivers.edit', ['driver' => Driver::findorFail($id)]);
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
        $driver = Driver::find($id);
        $driver->update($request->all());
        return redirect('/drivers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Driver::destroy($id);
        return redirect('/drivers');
    }
}
