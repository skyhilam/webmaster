<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Foundation\Message\MessageUsers;
use Validator;
use App\Models\Message;

class MessageController extends Controller
{
	use MessageUsers;

	protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'content' => 'required',
        ]);
    }

    protected function create(array $data)
    {
        return Message::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'content' => $data['content'],
        ]);
    }

}
