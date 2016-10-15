<?php 

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;


/**
* Pages About Controller
*/
class AboutController extends Controller
{
	
	public function index()
	{
		return view('admin.pages.about.index');
	}
}