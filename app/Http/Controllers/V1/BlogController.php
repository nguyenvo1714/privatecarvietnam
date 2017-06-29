<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $blogs = $this->blogRepo->footer();
        $interestTransfers = $this->transferRepo->top(4);
        $indexBlogs = $this->blogRepo->index(4);
        return view('sites.blogs.index', [
            'transferNames' => $transferNames,
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
        $blogs = $this->blogRepo->footer();
        $detail = $this->blogRepo->find_by_slug($slug);
        $next =  $this->blogRepo->next($detail->id);
        $prev = $this->blogRepo->prev($detail->id);
        $tags = $this->blogRepo->all_tag();
        $latest = $this->blogRepo->get_latest(4);
        // $next = Blog::where('id', '>', $detail->id)->min('id');
        return view('sites.blogs.content', [
            'transferNames' => $transferNames,
            'blogs' => $blogs,
            'detail' => $detail,
            'relates' => $relates,
            'next' => $next,
            'prev' => $prev,
            'tags' => $tags,
            'latest' => $latest
        ]);
    }

    public function get_blog_by_tag($tag_slug)
    {
        $transferNames = $this->transferNameRepo->allT();
        $blogs = $this->blogRepo->footer();
        $blogTags = $this->blogRepo->get_blog_by_tag($tag_slug, 4);
        return view('sites.blogs.blogByTag', [
            'transferNames' => $transferNames,
            'blogs' => $blogs,
            'blogTags' => $blogTags
        ]);
    }
}
