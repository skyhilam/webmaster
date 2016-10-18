<?php 

namespace App\Repositories;

use App\Models\Message;
use App\Models\MessageStorage;


/**
* Message storage repository
*/
class MessageStorageRepository extends Repository
{
	function __construct(MessageStorage $model)
	{
		$this->model = $model;
	}


	public function save(array $data)
	{
		$this->model->insert($data);
	}

	public function getTopSixNewMessage()
	{
		return $this->model
			->whereUserId(auth()->user()->role_id)
			->whereSeen(0)
			->with('message')
			->oldest('message_id')
			->take(6)
			->get();
	}


	public function readById($id)
	{
		$letter = $this->getById($id);

		if (!$letter->seen) {
			$letter->seen = 1;
			$letter->save();
		}

		return $letter->message;
	}

	public function delete($id)
	{
		$this->getById($id)->delete();
	}
}