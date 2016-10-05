<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\MessageRepository;
use App\Foundation\Message\MessageUsers;


class MessageController extends Controller
{
    protected $messages;
    protected $user;

    public function __construct(MessageRepository $messages, UserRepository $user)
    {
        $this->messages = $messages;
        $this->user = $user;
    }

	// use MessageUsers;

    public function index()
    {
        $messages = $this->user->getMessages();
        return view('admin.messages.index', compact('messages'));
    }

    public function showCreateForm()
    {
        return view('admin.messages.create');
    }

    public function send(Request $request)
    {
        $this->validator($request->all())->validate();

        $this->messages->send($request->all());
        $message = $this->messages->create($request->all());

        return redirect('/messages')->with('status', trans('messages.sent'));
    }

    public function showInfo($id)
    {
        $message = $this->messages->getById($id);

        return view('admin.messages.info', compact('message'));
    }

	protected function validator(array $data)
    {
        return Validator::make($data, [
            'to' => 'required|max:255',
            'subject' => 'required|max:255',
            'content' => 'required',
        ]);
    }

    public function delete($id)
    {
        $this->messages->getById($id)->delete();
        return redirect('/messages')->with('status', trans('messages.deleted'));
    }

    

}
