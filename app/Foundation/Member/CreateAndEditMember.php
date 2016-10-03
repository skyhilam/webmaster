<?php 
namespace App\Foundation\Member;

use App\Services\Statut;
use Illuminate\Http\Request;
use App\Events\MemberChangeInfo;
use App\Repositories\MemberRepository;

trait CreateAndEditMember
{
	protected $members;

	public function __construct(MemberRepository $members)
	{
		$this->members = $members;
	}

	public function showCreateForm()
	{
		$roles = $this->role_rep->get();
		return view('admin.member.create', compact('roles'));
	}

	public function register(Request $request)
	{
		$this->validator($request->all())->validate();
		$this->create($request->all());

		return redirect('/members')->with('status', trans('member.created'));

	}

	public function showEditForm($id)
	{
		$user = $this->members->getByPublicId($id);
		$roles = $this->role_rep->get();


		return view('admin.member.edit', compact('user', 'roles'));
	}

	public function changeInfo(Request $request, $id)
	{
		$this->validator($request->all(), 'info')->validate();	

		$this->members->updateByPublicId($id, 
			['name' => $request->name, 'role_id' => $request->role]);

		event(new MemberChangeInfo());
		return redirect()->back()->with('status', 'User info changed!');
	}

	public function changePassword(Request $request, $id)
	{
		$this->validator($request->all(), 'password')->validate();	

		$this->members->updateByPublicId($id, ['password' => bcrypt($request->password)]);

		return redirect()->back()->with('status', 'User password changed!');
	}

	public function delete($id)
	{
		$user = $this->members->getByPublicId($id);
		$user->delete();
		return redirect('/members')->with('status', trans('member.deleted'));
	}

}