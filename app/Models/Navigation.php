<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
	protected $table = 'navigations';


	protected $fillable = [
        'url', 'icon', 'title', 'type', 'order', 'permission'
    ];

    public $timestamps = false;

}