<?php 
namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository extends Repository
{

	public function __construct(User $user)
	{
		$this->model = $user;
	}

	

	public function user()
	{
		return Auth::user();
	}

	public function get()
	{
		return $this->user();
	}

	public function update(array $data)
	{
		$this->user()->update($data);
	}

	public function inbox($n = 12)
	{
		return $this->get()
			->indox()
			->latest()
			->paginate($n);
	}

	public function getByRoleId($role_id)
	{	
		$user = $this->user();
		$quent = $this->model->where('id', '!=', $user->id);
		if ($role_id == 'total') {
			return $quent->get();
		}else {
			return $quent->whereRoleId($role_id)->get();
		}
	}
	
}