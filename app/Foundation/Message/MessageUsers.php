<?php 
namespace App\Foundation\Message;

use Notification;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\NewMessage;

trait MessageUsers
{

	public function showMessageForm()
	{
		return view('message.send');
	}

	

	public function send(Request $request)
	{
		$this->validator($request->all())->validate();

		$message = $this->create($request->all());
		$admins = User::whereRoleId(1)->get();
		Notification::send($admins, new NewMessage($message));
		return redirect()->back()->with('status', 'the message sand, thank you for your message!');


	}
}