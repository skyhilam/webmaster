<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Foundation\Validator;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;


class SettingController extends Controller
{
	use Validator;

	protected $user;

	public function __construct(UserRepository $user)
	{
		$this->user = $user;
	}

	public function showInfo()
	{
		$user = $this->user->get();

		return view('admin.setting.info', compact('user'));
	}

	public function showEditForm($param)
	{
		$user = $this->user->get();
		return view('admin.setting.edit', compact('user', 'param'));
	}

	public function submitEditForm($param, Request $request)
	{
		$this->validator($request->all(), $param)->validate();

		$data = $param == 'password'? [$param => bcrypt($request->$param)] : $request->only($param);
		$this->user->update($data);

		return redirect('/setting')->with('status', trans('setting.'. $param));
	}


	protected function rules()
	{
		return $collection = collect([
			'password' => 'required|min:6|confirmed',
			'name' => 'required|max:250',
        ]);
	}

	
}