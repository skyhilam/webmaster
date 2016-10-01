<?php 
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Post extends Model
{
	protected $table = 'posts';

    use SearchableTrait;

    protected $searchable = [
        'columns' => [
            'content'           => 10,
            'title'             => 1,
        ]
    ];

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'default_image_id', 'type_id'
    ];


    public function images()
    {
    	return $this->hasMany('\App\Models\PostImage', 'post_id', 'id');
    }


    public function image()
    {
        return $this->hasOne('\App\Models\Image', 'id', 'default_image_id');
    }

    public function type()
    {
        return $this->belongsTo('\App\Models\PostType');
    }
}