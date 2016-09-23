<?php 
namespace App\Repositories;

use App\Models\Role;
use App\Services\Statut;

class RoleRepository extends Repository
{
	public function __construct(Role $role)
	{
		$this->model = $role;
	}

	public function get()
	{
		$role_id = Statut::getRoleId();
		return $this->model->where('id','>=', $role_id)->oldest('id')->get();
	}
}