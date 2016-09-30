<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PostTypeRepository;


class TypesController extends Controller
{
	protected $type;

	public function __construct(PostTypeRepository $type)
	{
		$this->type = $type;
	}

	public function index()
	{
		$types = $this->type->all();
		return view('admin.post.type.index', compact('types'));
	}
	public function showCreateForm()
	{
		return view('admin.post.type.create');
	}
	public function create(Request $request)
	{
		$this->validate($request, ['title'   => 'required']);
		$data = ['title' => $request->title];
		if ($this->type->create($data)) {
			return redirect('/post/types')->with('status', trans('post.type.created'));
		}
		return redirect()->back()->withErrors(trans('post.faild.create'));
	}
	public function showEditForm($id, $param)
	{
		$type = $this->type->getById($id);
		return view('admin.post.type.edit', compact('type', 'param'));
	}
	public function edit($id, $param, Request $request)
	{
		$this->validate($request, ['title'   => 'required']);

		if ($this->type->update($id, ['title' => $request->title])) {
			return redirect('/post/types')->with('status', trans('post.type.edited'));
		}else {
			return redirect()->back()->withErrors(trans('post.faild.edit'));
		}
	}
	public function delete($id, $param)
	{
		$this->type->destroy($id);
		return redirect('/post/types')->with('status', trans('post.type.deleted'));
		
	}
}