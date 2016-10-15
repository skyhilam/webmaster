<?php 

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;

/**
* Pages Home Controller
*/
class HomeController extends Controller
{
	
	public function index()
	{
		return view('admin.pages.home.index');
	}
}