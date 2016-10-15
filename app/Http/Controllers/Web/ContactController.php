<?php 

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Foundation\Validator;
use App\Http\Controllers\Controller;
use App\Repositories\MessageRepository;


/**
* Contact Controller
*/
class ContactController extends Controller
{
	use Validator;

	protected $message;

	public function __construct(MessageRepository $message)
	{
		$this->message = $message;
	}

	
	public function index()
	{
		return view('web.pages.contact');
	}

	public function send(Request $request)
	{
		$this->validator($request->all())->validate();

		$this->message->saveCustomMessage($request->all());

		return redirect()->back()->with('states', 'Thanks for your email');
	}

	protected function rules()
	{
		return $collection = collect([
			'email' => 'required|email|max:250',
			'content' => 'required',
        ]);
	}
}
