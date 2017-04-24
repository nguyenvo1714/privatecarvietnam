<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransferName;
use App\Type;

class TransferNameController extends Controller
{
    protected $rules = [
        'name' => 'required',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transferNames = new TransferName;
        return view('admin.transferNames.index', ['transferNames' => $transferNames->orderBy('created_at')->paginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::get();
        return view('/admin.transferNames.create', ['types' => $types]);
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
        $path = str_replace('public/', '', $request->file('thumb')->store('/public'));
        $transferName = new TransferName;
        $transferName->create([
            'name' => $request->name,
            'type_id' => $request->type_id,
            'thumb' => $path,
            'description' => $request->description
        ]);
        return redirect('/transferNames');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.transferNames.view',['transferName' => TransferName::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.transferNames.edit', [
            'transferName' => TransferName::findOrFail($id),
            'types' => Type::get()
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
        $transferName = TransferName::find($id);
        $transferName->update([
            'name' => $request->name,
            'type_id' => $request->type_id,
            'description' => $request->description
        ]);
        if( ! empty($request->thumb)) {
            $path = str_replace('public/', '', $request->file('thumb')->store('/public'));
            $transferName->update(['thumb' => $path]);
        }
        return redirect('/transferNames');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TransferName::destroy($id);
        return redirect('/transferNames');
    }
}
