<?php 

namespace App\Http\Controllers\Admin\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ImageRepository;
use Approached\LaravelImageOptimizer\ImageOptimizer;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use League\Glide\ServerFactory;
use League\Glide\Responses\LaravelResponseFactory;

/**
* Pages Home Controller
*/
class HomeController extends Controller
{

	protected $image;
	protected $imageOptimizer;


	public function __construct(ImageRepository $image, ImageOptimizer $imageOptimizer)
	{
		$this->image = $image;
		$this->imageOptimizer = $imageOptimizer;
	}

	

	public function test() 
	{
		$server = ServerFactory::create([
			'source' => public_path('img/uploads'),
			'cache' => public_path('img/cache'),
		    'response' => new LaravelResponseFactory()
		]);

		return $server->outputImage('DSC_5667.jpg', ['w' => 300, 'h' => 400]);
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
		$path = public_path("img/uploads/$filename");


		$img = \Image::make($image);
		$img->widen(1024)->save($path, 100);
		
		$this->imageOptimizer->optimizeImage($path);

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

















