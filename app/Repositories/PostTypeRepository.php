<?php 

namespace App\Repositories;

use App\Models\PostType;

class PostTypeRepository extends Repository 
{

	public function __construct(PostType $type)
	{
		$this->model = $type;
	}


	public function all() 
	{
		return $this->model->all();
	}

	public function update($id, $data)
	{
		return $this->model->whereId($id)->update($data);
	}

	public function create($data)
	{
		return $this->model->create($data);
	}
}