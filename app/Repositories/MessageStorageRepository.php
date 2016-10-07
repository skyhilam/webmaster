<?php 

namespace App\Repositories;

use App\Models\MessageStorage;


/**
* Message storage repository
*/
class MessageStorageRepository extends Repository
{
	function __construct(MessageStorage $message)
	{
		$this->model = $message;
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

	public function getByMessageId($id)
	{
		$user = auth()->user();
		return $this->model->whereMessageId($id)->whereUserId($user->id)->first();
	}


	public function readById($id)
	{
		$letter = $this->getByMessageId($id);

		if (!$letter->seen) {
			$letter->seen = 1;
			$letter->save();
		}

		return $letter->message;


	}

	public function delete($id)
	{
		$this->getByMessageId($id)->delete();
	}
}