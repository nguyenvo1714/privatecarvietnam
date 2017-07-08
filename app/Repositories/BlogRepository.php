<?php
	namespace App\Repositories;

	use App\Blog;
	use Conner\Tagging\Model\Tag;
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
			$this->chop_blog_footer($footers);
			return $footers;
		}

		public function index($limit)
		{
			$blogs = $this->blog->paginate($limit);
			$this->chop_blog($blogs, 0);
			return $blogs;
		}

		public function find_by_slug($slug)
		{
			return $this->blog->findBySlug($slug);
		}

		public function relate($slug, $limit)
		{
			$blog = $this->blog->findBySlug($slug);
			$tag_slug = [];
			foreach ($blog->tags as $tag) {
				$tag_slug[] = $tag->slug;
			}
			$relates = $this->blog->withAnyTag($tag_slug)
								->where('slug', '<>', $slug)
								->orderBy('id', 'asc')
								->limit($limit)
								->get();
			$this->chop_blog($relates);
			return $relates;
		}

		public function all_tag()
		{
			return Tag::get();
		}

		public function next($id)
		{
			$next = $this->blog->where('id', '>', $id)->orderBy('id', 'ASC')->first();
			if (! empty($next)) {
				$this->chop_title($next);
			}
			return $next;
		}

		public function prev($id)
		{
			$prev = $this->blog->where('id', '<', $id)->orderBy('id', 'DESC')->first();
			if (! empty($prev)) {
				$this->chop_title($prev);
			}
			return $prev;
		}

		public function count()
		{
			return $this->blog->get()->count();
		}

		public function get_blog_by_tag($tag_slug, $limit)
		{
			$blogs =  $this->blog->withAnyTag($tag_slug)->paginate($limit);
			$this->chop_blog($blogs, 0);
			return $blogs;
		}

		public function get_latest($limit)
		{
			$blogs = $this->blog->orderBy('id', 'DESC')->limit($limit)->get();
			$this->chop_blog($blogs, 0);
			return $blogs;
		}

		public function chop_blog($blogs, $footer_flg = 1)
		{
			foreach ($blogs as $blog) {
				if($footer_flg == 1) {
					$blog->description = implode(' ', array_slice(explode(' ', strip_tags($blog->content)), 0, 50));
				} else {
					$blog->description = implode(' ', array_slice(explode(' ', strip_tags($blog->content)), 0, 50));
				}
				preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $blog->content, $image);
				foreach ($image as $key => $value) {
					$blog->img = $value;
				}
			}
		}

		public function chop_blog_footer($blogs, $footer_flg = 1)
		{
			foreach ($blogs as $blog) {
				if($footer_flg == 1) {
					$blog->description = implode(' ', array_slice(explode(' ', strip_tags($blog->content)), 0, 15));
				} else {
					$blog->description = implode(' ', array_slice(explode(' ', strip_tags($blog->content)), 0, 15));
				}
				preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $blog->content, $image);
				foreach ($image as $key => $value) {
					$blog->img = $value;
				}
			}
		}

		public function chop_title($blog)
		{
			$blog->title = implode(' ', array_slice(explode(' ', $blog->title), 0, 5));
		}

		public function chop_string($string,$x=90) {
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