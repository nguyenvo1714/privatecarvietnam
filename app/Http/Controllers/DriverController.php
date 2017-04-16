<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Driver;
use App\Repositories\DriverRepository;

class DriverController extends Controller
{

    protected $rules = [
        'fullName'      => 'required',
        'address'       => 'required',
        'phone'         => 'required',
        'birthday'      => 'required',
        // 'age'           => 'required',
    ];

    protected $repository;

    public function __construct(DriverRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/admin.drivers.index', ['drivers' => $this->repository->all()]);
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
        $driver = new driver;
        preg_match('/^[0-9]{4}/', $request->birthday, $match, PREG_OFFSET_CAPTURE);
        $age = (int)date('Y') - (int)$match[0][0];
        $driver->create([
            'fullName' => $request->fullName,
            'address' => $request->address,
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'age' => $age,
        ]);
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
        $driver = $this->repository->getdriverById($id);
        return view('admin.drivers.view', ['driver' => $driver]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.drivers.edit', ['driver' => Driver::findOrFail($id)]);
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
        $driver = Driver::findOrFail($id);
        preg_match('/^[0-9]{4}/', $request->birthday, $match, PREG_OFFSET_CAPTURE);
        $age = (int)date('Y') - (int)$match[0][0];
        // var_dump($request->birthday);die;
        $driver->update([
            'fullName' => $request->fullName,
            'address' => $request->address,
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'age' => $age,
        ]);
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
