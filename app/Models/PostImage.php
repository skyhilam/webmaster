<?php 
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
	protected $table = 'post_image';

	public $timestamps = false;	


	public function image()
	{
		return $this->hasOne('\App\Models\Image', 'id', 'image_id');
	}
}