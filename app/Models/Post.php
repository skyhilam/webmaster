<?php 
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $table = 'posts';


	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content', 'default_image_id'
    ];


    public function images()
    {
    	return $this->hasMany('\App\Models\PostImage', 'post_id', 'id');
    }


    public function image()
    {
        return $this->hasOne('\App\Models\Image', 'id', 'default_image_id');
    }
}