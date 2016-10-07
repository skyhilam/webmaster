<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	protected $table = 'messages';


	protected $fillable = [
        'from', 'name', 'subject', 'content', 'created_at'
    ];

    public $timestamps = false;

}