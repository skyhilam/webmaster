<?php 
namespace App\Repositories;


use App\Models\Message;

class MessageRepository extends Repository
{
	public function __construct(Message $message)
	{
		$this->model = $message;
	}


	public function indexs($n = 15)
	{
		return $this->model
			->oldest('seen')
			->latest()
			->paginate($n);
	}
}