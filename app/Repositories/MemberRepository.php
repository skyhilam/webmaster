<?php 
namespace App\Repositories;

use App\Models\User;
use App\Services\Statut;

class MemberRepository extends Repository
{

	public function __construct(User $user)
	{
		$this->model = $user;
	}

	public function indexs($n = 15, $role)
	{
		$user = auth()->user();
		$role_id = $user->role_id;
		$id = $user->id;

		if ($role != 'total') {
			return $this->model
				->where('role_id', '>=', $role_id)
				->where('id', '!=', $id)
				->with('role')
				->whereHas('role', function($q) use ($role) {
					$q->whereSlug($role);
				})
				->latest()
				->oldest('name')
				->oldest('role_id')
				->paginate($n);
		}

		return $this->model
			->where('role_id', '>=', $role_id)
			->where('id', '!=', $id)
			->with('role')
			->latest()
			->oldest('name')
			->oldest('role_id')
			->paginate($n);
	}

	public function getByPublicId($id)
	{
		return $this->model->wherePublicId($id)->firstOrFail();
	}

	public function updateByPublicId($id, $data)
	{
		return $this->model->wherePublicId($id)->update($data);
	}

	public function create(array $data)
    {
        return $this->model->create([
            'name' => $data['name'],
            'public_id' => str_random(8),
            'email' => $data['email'],
            'role_id' => $data['role'],
            'password' => bcrypt($data['password']),
        ]);
    }
	
}