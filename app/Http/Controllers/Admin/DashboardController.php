<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
	public function get()
	{
		return view('admin.dashboard');
	}
}