<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Type;

class BlogController extends Controller
{

    protected $rules = [
        'type_id' => 'required|regex:/^[0-9]+/',
        'title' => 'required',
        'content' => 'required',
        'author' => 'required',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = new Blog;
        return view('admin.blogs.index', ['blogs' => $blogs->orderBy('created_at')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::get();
        return view('/admin.blogs.create', ['types' => $types]);
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
        $blog = Blog::create($request->all());
        $blog->tag(explode(',', $request->tags));
        return redirect('/admin/blogs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.blogs.view', ['blog' => Blog::findOrFail($id)]);
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
        $tags = Blog::existingTags()->pluck('name');
        $tagNames = [];
        foreach ($tags as $tag) {
            $tagNames[] = $tag;
        }
        return view('admin.blogs.edit', [
            'blog' => Blog::findOrFail($id),
            'types' => $types,
            'tagNames' => $tagNames
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
        $blog = Blog::find($id);
        $blog->update($request->all());
        $blog->retag(explode(',', $request->tags));
        return redirect('/admin/blogs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::destroy($id);
        return redirect('/admin/blogs');
    }
}
