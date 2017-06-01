<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Place;
use App\Blog;
use App\TransferName;
use App\Transfer;
use App\Repositories\TransferRepository;
use App\Repositories\BlogRepository;
use App\Repositories\TransferNameRepository;

class BlogController extends Controller
{
    protected $transferRepo;
    protected $blogRepo;
    protected $transferNameRepo;

    public function __construct(
        TransferRepository $transferRepo,
        BlogRepository $blogRepo,
        TransferNameRepository $transferNameRepo
    )
    {
        $this->transferRepo = $transferRepo;
        $this->blogRepo = $blogRepo;
        $this->transferNameRepo = $transferNameRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transferNames = $this->transferNameRepo->allT();
        $places = $this->transferNameRepo->allP();
        $blogs = $this->blogRepo->footer();
        $interestTransfers = $this->transferRepo->top(4);
        $indexBlogs = $this->blogRepo->index(4);
        return view('sites.blogs.index', [
            'transferNames' => $transferNames,
            'places' => $places,
            'blogs' => $blogs,
            'interestTransfers' => $interestTransfers,
            'indexBlogs' => $indexBlogs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function content($slug)
    {
        $relates = $this->blogRepo->relate($slug, 3);
        $transferNames = $this->transferNameRepo->allT();
        $places = $this->transferNameRepo->allP();
        $blogs = $this->blogRepo->footer();
        $detail = $this->blogRepo->find_by_slug($slug);
        return view('sites.blogs.content', [
            'transferNames' => $transferNames,
            'places' => $places,
            'blogs' => $blogs,
            'detail' => $detail,
            'relates' => $relates
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
