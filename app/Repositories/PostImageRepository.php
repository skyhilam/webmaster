<?php 
namespace App\Repositories;

use App\Models\PostImage;
use App\Repositories\ImageRepository;

class PostImageRepository extends Repository
{
	protected $img_rep;

	public function __construct(PostImage $post_img, ImageRepository $img_rep)
	{
		$this->model = $post_img;
		$this->img_rep = $img_rep;
	}


	public function insert(array $image_ids, $post_id)
	{
		$data = [];
        foreach ($image_ids as $image) {
            array_push($data, ['image_id' => $image->id, 'post_id' => $post_id]);
        }
        $this->model->insert($data);
	}


	public function deleteImages(array $data)
	{
		for ($i=0; $i < count($data); $i++) { 
			$id = $data[$i];
			$this->delete($id);
		}
	}



	public function getImagesById($id)
	{
		$array = $this->model
			->whereMapId($id)
			->with('image')
			->get()->toArray();


		$collection = collect($array);
		$keyed = $collection->mapWithKeys(function ($item) {
		    return [$item['image']];
		});

		return $keyed->all();
	}

	public function delete($id)
	{
		$post_img = $this->model->whereImageId($id)->first();
		$image = $post_img->image;
		$this->img_rep->delete($image->public_id);
		$post_img->delete();
	}
}