<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;


class SettingController extends Controller
{

	protected $user;

	public function __construct(UserRepository $user)
	{
		$this->user = $user;
	}

	public function showSetting()
	{
		$user = $this->user->getUser();

		return view('admin.setting.index', compact('user'));
	}

	public function showSettingName($name)
	{
		return view('admin.setting.name', compact('name'));
	}

	public function changeName(Request $request)
	{
		$this->validate($request, ['name' => 'required']);

		$this->user->update(['name' => $request->name]);

		return redirect('/setting')->with('status', trans('setting.name'));

	}

	public function showSettingPassword()
	{
		return view('admin.setting.password');
	}

	public function changePassword(Request $request)
	{
		$this->validate($request, ['password' => 'required|min:6|confirmed']);

		$this->user->update(['password' => bcrypt($request->password)]);

		return redirect('/setting')->with('status', trans('setting.password'));
	}
}