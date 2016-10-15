<?php 
namespace App\Repositories;


use Notification;
use App\Models\Message;


class MessageRepository extends Repository
{
    protected $storage;


	public function __construct(Message $model)
	{
		$this->model = $model;
	}


	public function indexs($n)
	{
		return $this->model
			->oldest('seen')
			->latest()
			->paginate($n);
	}


	public function create(array $data)
    {
        return $this->model->create([
            'email'         => $data['email'],
            'content' 	    => $data['content'],
            'created_at'    => \Carbon\Carbon::now()
        ]);

    }

    public function saveCustomMessage(array $data)
    {
        $message = $this->create($data);

        $this->sendAll($message);


    }

    protected function sendAll(Message $data)
    {
        $users = \App\Models\User::all('id', 'email', 'name');

        $data = $users->map(function($item) use ($data) {
            return ['user_id' => $item->id, 'message_id' => $data->id];
        });

        \App\Models\MessageStorage::insert($data->all());

        $this->notify($users);
    }


    public function notify($users)
    {
    	Notification::send($users,new \App\Notifications\NewMessage());
    }


}