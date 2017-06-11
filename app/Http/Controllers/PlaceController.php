<?php

namespace App\Http\Controllers;

use App\Place;
use App\Pickup;
use App\TransferName;
use Illuminate\Http\Request;

class PlaceController extends Controller
{

    protected $rules = [
        'name' => 'required',
        'transfer_name_id' => 'required',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = new Place;
        return view('admin.places.index', ['places' => $places->orderBy('created_at')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transferNames = TransferName::get();
        return view('/admin.places.create', ['transferNames' => $transferNames]);
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
        $place = new Place;
        $input = $request->all();
        $place->create($input);
        Pickup::create($input);
        return redirect('/places');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.places.view',['place' => Place::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transferNames = TransferName::get();
        return view('admin.places.edit', ['place' => Place::findOrFail($id), 'transferNames' => $transferNames]);
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
        $place = Place::find($id);
        $pick_up = Pickup::find($id);
        $place->update($request->all());
        $pick_up->update($request->all());
        return redirect('/places');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Place::destroy($id);
        Pickup::destroy($id);
        return redirect('/places');
    }
}
