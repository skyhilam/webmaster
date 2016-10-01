<?php 
namespace App\Repositories;

use App\Models\Post;

class PostRepository extends Repository
{
	public function __construct(Post $post)
	{
		$this->model = $post;
	}

	public function indexs($n = 12, $type = 'all')
	{
		if ($type == 'all') {
			return $this->model
				->search(request()->input('keyworks', ''))
				->with('image')
				->with('images')
				->paginate($n);
		}

		return $this->model
			->with('image')
			->with('images')
			->search(request()->input('keyworks', ''))
			->whereTypeId($type)
			->paginate($n);
	}

	public function create(array $data)
	{
		return $this->model->create([
			'title' => $data['title'],
			'content' => $data['content'],
			'type_id' => $data['type_id'],
			'default_image_id' => $data['default_image_id'],
		]);
	}

	public function getTopSixPost($type)
	{
		return $this->model->with('image')->whereType($type)->take(6)->latest()->get();
	}
	


	public function setDefaultImage($id)
	{
		$post = $this->getById($id);

		if (empty($post->image)) {
			$image = $post->images[0];
			$post->default_image_id = $image->image_id;
			$post->save();
		}
	}


}