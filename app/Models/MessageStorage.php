<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
* 	Message storage model
*/
class MessageStorage extends Model
{
	
	protected $table = 'message_storage';

	protected $fillable = [
        'user_id', 'message_id', 'seen'
    ];

    public $timestamps = false;


    public function message()
    {
    	return $this->hasOne('App\Models\Message', 'id', 'message_id');
    }
}