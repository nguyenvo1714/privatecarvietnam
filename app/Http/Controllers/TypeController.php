<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;
use DB;

class TypeController extends Controller
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
        $types = new Type;
        return view('admin.types.index', ['types' => $types->orderBy('created_at')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin.types.create');
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
        $type = new Type;
        $input = $request->all();
        $type->create($input);
        return redirect('/types');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.types.view',['type' => Type::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.types.edit',['type' => Type::findOrFail($id)]);
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
        $type = Type::find($id);
        $type->update($request->all());
        return redirect('/types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (request()->ajax()) {
            $type = Type::find($id);
            if ($type) {
                DB::transaction(function () use ($type) {
                    $type->delete();
                });
                return response()->json(['message' => "Item $id has been deleted!"], 200);
            }
            return response()->json(['message' => 'Type not found'], 404);
        }
        return response()->json(['message' => 'Method does not allowed!'], 405);
    }
}
