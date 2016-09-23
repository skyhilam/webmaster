<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository;

class RoleController extends Controller
{
	protected $role_rep;

	public function __construct(RoleRepository $role_rep)
	{
		$this->role_rep = $role_rep;
	}

	public function get()
	{
		$roles = $this->role_rep->get();
		return view('admin.role.index', compact('roles'));
	}
}