<?php 
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	use Notifiable;

	protected $table = 'messages';


	protected $fillable = [
        'name', 'email', 'content'
    ];


}