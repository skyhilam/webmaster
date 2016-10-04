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

	public function getMessages($n = 12)
	{
		return $this->getUser()->messages()->oldest('seen')
			->latest()
			->paginate($n);
	}
}