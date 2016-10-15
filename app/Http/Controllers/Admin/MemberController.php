<?php 
namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Foundation\Validator;
use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository;
use App\Repositories\MemberRepository;
use App\Foundation\Member\CreateAndEditMember;

class MemberController extends Controller
{
    use Validator;



	protected $members, $roles;

	public function __construct(MemberRepository $members, RoleRepository $roles)
	{
		$this->members = $members;
		$this->roles = $roles;
	}

	public function index(Request $request)
	{
		$role = $request->input('role', 'total');

		$users = $this->members->indexs(11, $role);
		$roles = $this->roles->all();

		return view('admin.member.index', compact('users', 'roles', 'role'));
	}


    public function showCreateForm()
    {
        $roles = $this->roles->all();
        return view('admin.member.create', compact('roles'));
    }

    public function submitCreateForm(Request $request)
    {

        $this->validator($request->all())->validate();
        $this->members->create($request->all());
        return redirect('/members')->with('status', trans('member.created'));
    }


    public function showInfo($id)
    {  
        $user = $this->members->getByPublicId($id);
        return view('admin.member.info', compact('user'));
    }


    public function showEditForm($id, $param)
    {
        $user = $this->members->getByPublicId($id);
        $roles = $this->roles->all();
        return view('admin.member.edit', compact('param', 'user', 'roles'));
    }


    public function submitEditForm(Request $request, $id, $param) 
    {
        $this->validator($request->all(), $param)->validate();

        if ($param == 'role') {
            $data = ['role_id' => $request->role];
        }else {
            $data = $param == 'password'? [$param => bcrypt($request->$param)] : $request->only($param);
        }


        $this->members->updateByPublicId($id, $data);

        return redirect('/members/info/'. $id)->with('status', trans('setting.'.$param));
    }


    protected function rules()
    {
        return $collection = collect([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'role' => 'required|exists:roles,id',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    
    public function delete($id)
    {
        $user = $this->members->getByPublicId($id);
        $user->delete();
        return redirect('/members')->with('status', trans('member.deleted'));
    }




    
}