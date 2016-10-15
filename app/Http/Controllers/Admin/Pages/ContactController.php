<?php 

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;


/**
* Pages Contact Controller
*/
class ContactController extends Controller
{
	
	public function index()
	{
		return view('admin.pages.contact.index');
	}
}