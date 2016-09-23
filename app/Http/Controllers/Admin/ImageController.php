<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Cloudder;

class ImageController extends Controller
{
	protected $image;


	public function __construct(\App\Repositories\ImageRepository $image_repository) {
		$this->image = $image_repository;
	}

	public function index(Request $request)
	{
		if ($request->ajax()) {
			return $this->image->getByStatus(0);
		}
		return view('admin.image.index');
	}



	public function upload(Request $request)
	{
		$this->validator($request->all())->validate();


		$image = Cloudder::upload($request->file, str_random(8), [], [$request->file->getClientOriginalName()])->getResult();



		return $this->image->save($image);
		

		

	}

	public function delete(Request $request)
	{
		$this->image->delete($request->all());
	}

	/**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'file' => 'required|image|max:2000',
        ]);
    }


}