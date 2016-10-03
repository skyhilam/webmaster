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

    public function createMember(Request $request)
    {
        $this->validator($request->all())->validate();
        $this->create($request->all());
        return redirect('/members')->with('status', trans('member.created'));
    }


    public function showInfo($id)
    {  
        $user = $this->members->getByPublicId($id);
        return view('admin.member.info', compact('user'));
    }


    public function showEditForm($param, $id)
    {
        $user = $this->members->getByPublicId($id);
        $roles = $this->roles->all();
        return view('admin.member.edit', compact('param', 'user', 'roles'));
    }


    public function edit(Request $request, $param, $id) 
    {
        $rules = $this->getRules($param);
        $this->validate($request, $rules);

        $data = $this->formatUpdateData($param, $request->all());

        $this->members->updateByPublicId($id, $data);

        return redirect('/member/info/'. $id)->with('status', trans('setting.'.$param));
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


    
}