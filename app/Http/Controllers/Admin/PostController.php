<?php 

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use App\Repositories\ImageRepository;
use App\Repositories\PostTypeRepository;
use App\Repositories\PostImageRepository;

class PostController extends Controller
{
	protected $post;
	protected $types;
	protected $image;
	protected $post_image;

	public function __construct(PostRepository $post, PostTypeRepository $types, ImageRepository $image, PostImageRepository $post_image)
	{
		$this->post = $post;
		$this->types = $types;
		$this->image = $image;
		$this->post_image = $post_image;
	}

	

	public function get(Request $request)
	{	
		$posts = $this->post->indexs(12, $request->input('type', 'all'));
		$types = $this->types->all();

		return view('admin.post.index', compact('posts', 'types'));
	}

	public function showCreateForm()	
	{
		$types = $this->types->all();		
		return view('admin.post.create', compact('types'));
	}

	public function create(Request $request)
	{
		$this->validator($request->all())->validate();

		$uploaded = $this->image->uploads($request->file('images', []));

        $input = $request->all();
        $input['default_image_id'] = $uploaded[0]->id;

		$post = $this->post->create($input);
        $this->post_image->insert($uploaded, $post->id);


		return redirect('/posts')->with('status', trans('post.created'));

	}

	protected function validator(array $data)
    {
        return \Validator::make($data, [
        	'title' => 'required|max:50',
        	'type_id' => 'required|exists:post_types,id',
            'content' => 'required',
            'images' => 'required',
            'images.*' => 'image|max:2000' //max:2000 = 2M
        ]);
    }

    public function showInfo($id)
    {
    	$post = $this->post->getById($id);

    	return view('admin.post.info', compact('post'));

    }

    public function showEditForm($id, $param)
    {
    	$types = $this->types->all();
		$data = $this->post->getById($id);
		return view('admin.post.edit', compact('types', 'data', 'param'));
    }

    public function edit(Request $request, $id, $param)
	{
		$data = $this->post->getById($id);

		$this->validate($request, [
            'images.*'   => 'image|max:2000' //max:2000 = 2M
        ]);

		if ($param == 'images') {
			$deleteImages = $request->input('deleteImages', []);
			$updateImages = $request->file('images', []);

			if ($data->images->count() == count($deleteImages)) {
				return redirect()->back()->withErrors(trans('post.delete_faild'));
			}

			if (count($deleteImages) > 0) {
				$this->post_image->deleteImages($deleteImages);
			}

			if (count($updateImages) > 0) {
				$uploaded = $this->image->uploads($updateImages);
				$this->post_image->insert($uploaded, $id);
			}

			$this->post->setDefaultImage($id);

		}else {
			if ($param == 'image') {
				$data->default_image_id = $request->default_image_id;
			}elseif ($param == 'type') {
				$data->type_id = $request->type_id;
			}
			else {
				$data->{$param} = $request->{$param};
			}
			$data->save();
			
		}


		return redirect("/post/info/{$id}")->with('status', trans('post.edited'));
	}


	public function delete($id)
	{
		$post = $this->post->getById($id);

		$images = collect($post->images)->map(function ($item, $key) {
			return $item['image_id'];
			})->all();

		$this->post_image->deleteImages($images);

		$post->delete();

		return redirect('/posts')->with('status', trans('post.deleted'));
	}
}










