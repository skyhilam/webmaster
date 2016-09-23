<?php 
namespace App\Repositories;

use App\Models\Post;

class PostRepository extends Repository
{
	public function __construct(Post $post)
	{
		$this->model = $post;
	}

	public function indexs($n = 15)
	{
		return $this->model
			->with('image')
			->paginate($n);
	}

	/**
     * Create a new post instance after a valid create new post.
     *
     * @param  array  $data
     * @return Post::create()
     */
	public function create(array $data)
	{
		return Post::create([
            'content' => $data['content'],
            'default_image_id' => $data['default_image_id']
        ]);
	}
	
}