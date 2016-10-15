<?php 

namespace App\Repositories;

use App\Models\Navigation;
use App\Repositories\Repository;


/**
* Navigation Repository
*/
class NavigationRepository extends Repository
{

	public function __construct(Navigation $model)
	{
		$this->model = $model;
	}

	public function all()
	{
		return $this->model->oldest('type')->oldest('order')->get()->groupBy('type');	
	}

	public function create(array $data)
	{
		return Navigation::create([
			'url'			=> $data['url'],
			'icon'			=> $data['icon'],
			'title'			=> $data['title'],
			'type' 			=> $data['type'],
			'permission' 	=> $data['permission'],
			'order'			=> $data['order']]);
	}

	public function update($id, array $data)
	{
		$this->model->whereId($id)->update($data);
	}
}