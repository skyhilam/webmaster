<?php 

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\ImageRepository;


/**
* Home Controller
*/
class HomeController extends Controller
{
	protected $image;

	public function __construct(ImageRepository $image)
	{
		$this->image = $image;
	}

	
	public function index()
	{
		$images = $this->image->indexs(12);
		return view('web.pages.home', compact('images'));
	}
}
