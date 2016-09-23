<?php 
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\MemberRepository;
use App\Repositories\RoleRepository;
use App\Foundation\Member\CreateAndEditMember;
use Validator;
use App\Models\User;
use Auth;

class MemberController extends Controller
{
	use CreateAndEditMember;

	protected $mem_rep, $role_rep;

	public function __construct(MemberRepository $mem_rep, RoleRepository $role_rep)
	{
		$this->mem_rep = $mem_rep;
		$this->role_rep = $role_rep;
	}

	public function get(Request $request)
	{
		$role = $request->input('role', 'total');

		$users = $this->mem_rep->indexs(12, $role);
		$roles = $this->role_rep->get();
		return view('admin.member.index', compact('users', 'roles', 'role'));
	}


    public function showInfo($id)
    {  
        $user = $this->mem_rep->getByPublicId($id);
        return view('admin.member.info', compact('user'));
    }

    public function showEditNameForm($id)
    {
        $user = $this->mem_rep->getByPublicId($id);
        return view('admin.member.name', compact('user'));
    }

    public function showEditRoleForm($id)
    {
        $user = $this->mem_rep->getByPublicId($id);
        $roles = $this->role_rep->get();
        return view('admin.member.role', compact('user', 'roles'));
    }

    public function showEditPasswordForm($id)
    {
        $user = $this->mem_rep->getByPublicId($id);
        return view('admin.member.password', compact('user'));
    }

    public function changeParam($param, $id, Request $request)
    {
        $rules = $this->getRules($param);
        $this->validate($request, $rules);

        $data = $this->formatUpdateData($param, $request->all());

        $this->mem_rep->updateByPublicId($id, $data);

        return redirect()->back()->with('status', trans('setting.'.$param));
    }

    protected function formatUpdateData($param, array $data)
    {
        $value = $data[$param];
        if ($param == 'password') {
            return [ 'password' => bcrypt($value) ];
        }elseif($param == 'role'){
            return [ 'role_id' => $value ];
        }else {
            return [ $param => $value ];
        }
    }


    protected function getRules($param)
    {
        switch ($param) {
            case 'name':
                return ['name' => 'required|max:255'];
                break;
            case 'password':
                return [
                    'password' => 'required|min:6|confirmed',
                ];
                break;
            case 'role':
                return [
                    'role' => 'required|exists:roles,id',
                ];
                break;
            default:
                return [
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users',
                    'role' => 'required|exists:roles,id',
                    'password' => 'required|min:6|confirmed',
                ];
                break;
        }
    }

	/**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data, $mode = '')
    {
        return Validator::make($data, $this->rules($mode));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'public_id' => str_random(8),
            'email' => $data['email'],
            'role_id' => $data['role'],
            'password' => bcrypt($data['password']),
        ]);
    }


    protected function rules($mode)
    {
        switch ($mode) {
            case 'info':
                return [
                    'name' => 'required|max:255',
                    'role' => 'required|exists:roles,id',
                ];
                break;
            case 'password':
                return [
                    'password' => 'required|min:6|confirmed',
                ];
                break;
            default:
                return [
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users',
                    'role' => 'required|exists:roles,id',
                    'password' => 'required|min:6|confirmed',
                ];
                break;
        }
    }
}