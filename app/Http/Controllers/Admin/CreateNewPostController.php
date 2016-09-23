<?php 
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\ImageRepository;
use App\Repositories\PostRepository;
use App\Repositories\PostImageRepository;

use App\Models\Post;
use App\Models\Image;
use App\Models\PostImage;

class CreateNewPostController extends Controller
{
    protected $img_rep;

    protected $post_rep;

    protected $post_img_rep;

    public function __construct(ImageRepository $img_rep, PostRepository $post_rep, PostImageRepository $post_img_rep)
    {
        $this->img_rep = $img_rep;
        $this->post_rep = $post_rep;
        $this->post_img_rep = $post_img_rep;
    }


	public function get()
	{
		return view('admin.post.new');
	}

	public function post(Request $request)
	{
		$this->validator($request->all())->validate();

		$uploaded = $this->img_rep->uploads($request->file('files', []));

        $input = $request->all();
        $input['default_image_id'] = $uploaded[0]->id;

		$post = $this->post_rep->create($input);
        $this->post_img_rep->insert($uploaded, $post->id);


		return redirect('/posts')->with('success', 'created new post');

	}


    


	

	/**
     * Get a validator for an incoming create new post request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return \Validator::make($data, [
            'content' => 'required',
            'files' => 'required',
            'files.*' => 'image|max:2000' //max:2000 = 2M
        ]);
    }
}