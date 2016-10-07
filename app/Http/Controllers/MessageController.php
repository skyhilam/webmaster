<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use App\Repositories\MessageRepository;
use App\Foundation\Message\MessageUsers;
use App\Repositories\MessageStorageRepository;


class MessageController extends Controller
{
    protected $messages;
    protected $user;
    protected $roles;
    protected $inbox;

    public function __construct(MessageRepository $messages, UserRepository $user, RoleRepository $roles, MessageStorageRepository $inbox)
    {
        $this->messages = $messages;
        $this->user = $user;
        $this->roles = $roles;
        $this->inbox = $inbox;
    }

	// use MessageUsers;

    public function index()
    {
        $inbox = $this->user->getInbox();
        return view('admin.messages.index', compact('inbox'));
    }

    public function showCreateForm()
    {
        $roles = $this->roles->all(2);

        return view('admin.messages.create', compact('roles'));
    }

    public function send(Request $request)
    {
        $this->validator($request->all())->validate();
        $this->messages->send($request->all());

        return redirect('/messages')->with('status', trans('messages.sent'));
    }


    public function showInfo($id)
    {
        $message = $this->inbox->readById($id);

        return view('admin.messages.info', compact('message'));
    }

	protected function validator(array $data)
    {
        return Validator::make($data, [
            'subject' => 'required|max:255',
            'content' => 'required',
        ]);
    }

    public function delete($id)
    {
        $this->inbox->delete($id);
        return redirect('/messages')->with('status', trans('messages.deleted'));
    }

    

}
