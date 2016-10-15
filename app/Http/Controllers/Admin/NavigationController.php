<?php 

namespace App\Http\Controllers\Admin;

use App\Models\Navigation;
use Illuminate\Http\Request;
use App\Foundation\Validator;
use App\Http\Controllers\Controller;
use App\Repositories\NavigationRepository;

/**
* Navigation Controller
*/
class NavigationController extends Controller
{
	use Validator;

	protected $navigation;

	public function __construct(NavigationRepository $navigation)
	{
		$this->navigation = $navigation;
	}

	public function index()
	{
		$navigations = $this->navigation->all();
		return view('admin.navigation.index',  compact('navigations'));
	}


	public function showCreateForm()
	{
		return view('admin.navigation.create');
	}

	public function submitCreateForm(Request $request)
	{
		$this->validator($request->all())->validate();
		$this->navigation->create($request->all());
		return redirect('/navigations')->with('status', trans('navigation.created'));
	}


	protected function rules()
	{
		return $collection = collect([
			'url' 			=> 'required',
			'title' 		=> 'required',	
			'type' 			=> 'required',
			'icon' 			=> 'required',
			'order' 		=> 'required',
			'permission' 	=> 'required',
        ]);
	}


	public function showInfo($id)
	{
		$navigation = $this->navigation->getById($id);

		return view('admin.navigation.info', compact('navigation'));
	}


	public function showEditForm($id, $param)
	{
		$navigation = $this->navigation->getById($id);
		return view('admin.navigation.edit', compact('navigation', 'param'));
	}
	

	public function submitEditForm($id, $param, Request $request)
	{
		$this->validator($request->all(), $param);

		$this->navigation->update($id, $request->only($param));
		return redirect('/navigations/info/'. $id)->with('status', trans('navigation.edited'));
	}

	public function deleteInfo($id)
	{
		$this->navigation->destroy($id);
	return redirect('/navigations/')->with('status', trans('navigation.deleted'));
	}

}