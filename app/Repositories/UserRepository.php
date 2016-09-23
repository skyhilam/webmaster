<?php 
namespace App\Repositories;

use Illuminate\Support\Facades\Auth;

class UserRepository extends Repository
{
	

	public function user()
	{
		return Auth::user();
	}

	public function getUser()
	{
		return $this->user();
	}

	public function update(array $data)
	{
		$this->user()->update($data);
	}
}