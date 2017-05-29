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

		public function index($limit)
		{
			$blogs = $this->blog->limit($limit)->get();
			$this->chop_blog($blogs, 0);
			return $blogs;
		}

		public function count()
		{
			return $this->blog->get()->count();
		}

		public function chop_blog($blogs, $footer_flg = 1)
		{
			foreach ($blogs as $blog) {
				if($footer_flg == 1) {
					$blog->description = $this->chop_string($blog->content);
				} else {
					$blog->description = $this->chop_string_blog($blog->content);
				}
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

		public function chop_string_blog($string,$x=300) {
			$string = strip_tags(stripslashes($string)); // convert to plaintext
			return substr($string, 0, $x);
			// return substr($string, 0, strpos(wordwrap($string, $x), "."));
		}
	}