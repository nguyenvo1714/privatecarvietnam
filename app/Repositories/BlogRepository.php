<?php
	namespace App\Repositories;

	use App\Blog;

	/**
	* 
	*/
	class BlogRepository
	{
		protected $blog;

		public function __construct(Blog $blog)
		{
			$this->blog = $blog;
		}

		public function footer()
		{
			$footers = $this->blog->limit(2)->get();
			$this->chop_blog($footers);
			return $footers;
		}

		public function chop_blog($blogs)
	    {
	        foreach ($blogs as $blog) {
	            $blog->description = $this->chop_string($blog->content);
	            preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $blog->content, $image);
	            foreach ($image as $key => $value) {
	                $blog->img = $value;
	            }
	        }
	    }

	    public function chop_string($string,$x=100) {
	        $string = strip_tags(stripslashes($string)); // convert to plaintext
	        return substr($string, 0, $x);
	        // return substr($string, 0, strpos(wordwrap($string, $x), "."));
	    }
	}