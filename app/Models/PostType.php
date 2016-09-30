<?php 
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class PostType extends Model
{
	protected $table = 'post_types';


	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title'
    ];


    public function posts()
    {
    	return $this->hasMany('\App\Models\Post', 'post_id', 'id');
    }
    
    public $timestamps = false; 

}