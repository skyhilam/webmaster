<?php 
namespace App\Repositories;

use App\Models\Image;

class ImageRepository extends Repository
{



	public function __construct(Image $img)
	{
		$this->model = $img;
	}

	
	public function create(array $data)
	{
		$this->model->create([
			'public_id' 	=> str_random(20),
			'url' 			=> $data['url'],
			'mobile_url' 	=> $data['mobile_url'],
			'filename' 		=> $data['filename'],
			'path'			=> $data['path'],
		]);
	}

	public function indexs($n)
	{
		return $this->model->paginate($n);
	}

	public function delete($id)
	{
		$image = $this->model->wherePublicId($id)->first();
		$filename = $image->filename;
		$path = $image->path??public_path("uploads");
		\File::delete("$path/$filename", "$path/mobile{$filename}");
		$image->delete();
	}


}