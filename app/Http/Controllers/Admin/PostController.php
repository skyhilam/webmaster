<?php 

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use Validator;
use App\Repositories\PostRepository;

class PostController extends Controller
{
	protected $post_rep;

	public function __construct(PostRepository $post_rep)
	{
		$this->post_rep = $post_rep;
	}

	

	public function get(Request $request)
	{	
		$posts = $this->post_rep->indexs();

		return view('admin.post.index', compact('posts'));
	}


	
}