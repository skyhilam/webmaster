<?php 
namespace App\Repositories;

use App\Models\Image;

class ImageRepository extends Repository
{

	protected $path = '/img/uploads/';


	public function __construct(Image $img)
	{
		$this->model = $img;
	}

	

	/**
	* @param array $files
	* @return array
	**/
	public function uploads(array $files)
	{
		return collect($files)->map(function ($item, $key) {
            return $this->save($item);
		})->all();
	}





	/**
	* @param $file
	* @return array()
	**/
	public function save($file)
	{
		$public_id = str_random(8);

		\Cloudder::upload(
            $file, 
            $public_id, //public_id
            [], //options
            [$file->getClientOriginalName()] //tags
        );


		return $this->model->create([
			'public_id' => $public_id,
            'created_at' => \Carbon\Carbon::now(),
		]);
	}




	/**
	* @param $image
	* @return null
	**/
	public function delete($public_id)
	{
		\Cloudder::destroyImage($public_id);
		$this->model->wherePublicId($public_id)->delete();
	}




}