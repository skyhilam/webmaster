<?php 
namespace App\Repositories;


use App\Models\Message;

class MessageRepository extends Repository
{
	public function __construct(Message $message)
	{
		$this->model = $message;
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
            'to' => $data['to'],
            'cc' => $data['cc'],
            'subject' => $data['subject'],
            'content' => $data['content'],
        ]);
    }


    public function send(array $data)
    {
    	$user = \Auth::user();
    	\Mail::send('admin.emails.messages', $data, function ($message) use ($data, $user) {
		    $message->from($user->email, $user->name);

		    $message->to($data['to']);
		    if ($data['cc']) {
		    	$message->cc($data['cc']);
		    }
		    $message->subject($data['subject']);
		});
    }
}