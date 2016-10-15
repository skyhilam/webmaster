<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\MessageRepository;
use App\Repositories\MessageStorageRepository;


class MessageController extends Controller
{
    protected $user;
    protected $inbox;

    public function __construct(UserRepository $user,MessageStorageRepository $inbox)
    {
        $this->user = $user;
        $this->inbox = $inbox;
    }


    public function index()
    {
        $inbox = $this->user->inbox();
        return view('admin.messages.index', compact('inbox'));
    }


    public function showInfo($id)
    {
        $message = $this->inbox->readById($id);
        return view('admin.messages.info', compact('message'));
    }



    public function delete($id)
    {
        $this->inbox->delete($id);
        return redirect('/messages')->with('status', trans('messages.deleted'));
    }

    

}
