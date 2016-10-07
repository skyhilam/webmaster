<?php 
namespace App\Repositories;


use Notification;
use App\Models\Message;
use App\Notifications\NewMessage;
use App\Repositories\UserRepository;

class MessageRepository extends Repository
{
	protected $users;
    protected $storage;


	public function __construct(Message $message, UserRepository $users, MessageStorageRepository $storage)
	{
		$this->model = $message;
		$this->users = $users;
        $this->storage = $storage;
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
            'from' 		 => $data['from'],
            'name'  => $data['name'],
            'subject' 	 => $data['subject'],
            'content' 	 => $data['content'],
            'created_at' => \Carbon\Carbon::now()
        ]);
    }


    public function send(array $data)
    {
    	$user = $this->users->get();
    	$data['from'] = $user->email;
    	$data['name'] = $user->name;

    	$to = $this->users->getByRoleId($data['to_group']);
        $message = $this->create($data);

    	$send_to = $to->map(function($item) use ($message) {
            return ['user_id' => $item->id, 'message_id' => $message->id];
        });

        $this->storage->save($send_to->all());
    	$this->notify($to);
    }

    public function notify($users)
    {
    	Notification::send($users,new NewMessage());
    }


}