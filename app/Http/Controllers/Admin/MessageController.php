<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\MessageRepository;

class MessageController extends Controller
{
	protected $msg_rep;

	public function __construct(MessageRepository $msg_rep)
	{
		$this->msg_rep = $msg_rep;
	}

	public function get()
	{

		$messages = $this->msg_rep->indexs();
		return view('admin.message.index', compact('messages'));
	}
}