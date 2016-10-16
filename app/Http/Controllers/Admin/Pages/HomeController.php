<?php 

namespace App\Http\Controllers\Admin\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ImageRepository;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
* Pages Home Controller
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
		return view('admin.pages.home.index', compact('images'));
	}

	public function uploadImage(Request $request)
	{
		$this->saveImage($request->image);

		return $this->successRedirect();

	}

	protected function saveImage(UploadedFile $image)
	{
		$filename = $image->getClientOriginalName();
		$path = public_path("uploads/$filename");


		$img = \Image::make($image);
		$img->save($path);

		// mobile
		list($width, $height) = getimagesize($image);
		if ($width > 414) {
			$img->widen(414)
				->save(public_path("uploads/mobile{$filename}"));
		}

		$this->image->create([
			'url' 			=> asset("uploads/$filename"), 
			'mobile_url' 	=> asset("uploads/mobile{$filename}"), 
			'path'			=> public_path("uploads"),
			'filename' 		=> $filename
		]);


	}

	public function deleteItem($id)
	{
		$this->image->delete($id);
		return $this->successRedirect();
	}

	protected function successRedirect()
	{
		return redirect()->back();
	}

}

















