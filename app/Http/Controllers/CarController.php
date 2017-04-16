<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Driver;
use App\Car;
use App\Repositories\CarRepository;

class CarController extends Controller
{
    protected $repository;

	public function __construct(CarRepository $repository)
	{
		$this->repository = $repository;
	}

    protected $rules = [
        'driver_id'      => 'required|regex:/^[0-9]+/',
        'brand'          => 'required',
        'seat'           => 'required|regex:/^[0-9]+/',
        'price'          => 'required',
        'class'          => 'required',
        'image'	         => 'required',
        'isActive'       => 'required|regex/^[0-1]{1}/',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$cars = $this->repository->all();
        return view('/admin.cars.index', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$drivers = Driver::get();
        return view('/admin.cars.create', ['drivers' => $drivers]);
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
        $car = new Car;
        $car->create($request->all());
        return redirect('/cars');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$car = $this->repository->getcarById($id);
        return view('admin.cars.view', ['car' => $car]);
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
    	$car = Car::find($id);
        return view('admin.cars.edit', ['car' => $car, 'types' => $types, 'places' => $places, 'blogs' => $blogs]);
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
        $car = Car::find($id);
        $car->update($request->all());
        return redirect('/cars');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Car::destroy($id);
        return redirect('/cars');
    }
}
