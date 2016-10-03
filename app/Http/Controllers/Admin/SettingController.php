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

	public function showEditForm($param)
	{
		$user = $this->user->getUser();
		return view('admin.setting.edit', compact('user', 'param'));
	}

	public function edit($param, Request $request)
	{
		$this->validate($request, $this->getRules($param));
		$data = $this->getDataByParam($param, $request->all());
		$this->user->update($data);
		return redirect('/setting')->with('status', trans('setting.'. $param));
	}

	protected function getRules($param)
	{
		if ($param == 'password') {
			return ['password' => 'required|min:6|confirmed'];
		}else {
			return ['name' => 'required'];
		}
	}

	protected function getDataByParam($param, array $data)
	{
		if ($param == 'password') {
			return ['password' => bcrypt($data['password'])];
		}else {
			return ['name' => $data['name']];
		}
	}

}