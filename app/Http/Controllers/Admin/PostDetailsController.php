<?php 
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

use Validator;

use App\Repositories\PostRepository;
use App\Repositories\PostImageRepository;
use App\Repositories\ImageRepository;

class PostDetailsController extends Controller
{
	protected $post_rep;

	protected $post_img_rep;

	protected $img_rep;


	public function __construct(PostRepository $post_rep, PostImageRepository $post_img_rep, ImageRepository $img_rep)
	{
		$this->post_rep = $post_rep;
		$this->post_img_rep = $post_img_rep;
		$this->img_rep = $img_rep;
	}


	public function get($id, Request $request)
	{
		$post = $this->post_rep->getById($id);

		return view('admin.post.details', compact('post'));
	}



	public function post($id, Request $request)
	{
		$post = $this->post_rep->getById($id);

		$this->post_img_rep->deleteImages($request->input('deleteImages', []));

		$uploaded = $this->img_rep->uploads($request->file('files', []));
		$this->post_img_rep->insert($uploaded, $id);
		

		$post->content = $request->content;
		$post->save();

		return redirect()->back()->with('success', 'post updated');

	}

	

	public function delete($id)
	{
		$post = $this->post_rep->getById($id);

		$images = collect($post->images)->map(function ($item, $key) {
			return $item['image_id'];
			})->all();

		$this->post_img_rep->deleteImages($images);

		$post->delete();

		return redirect()->back()->with('success', 'post deleted');
	}

}