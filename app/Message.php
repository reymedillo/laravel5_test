<?php namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model {

	protected $table = 'messages';
	protected $fillable = array('user_id', 'body','sender_id');

	public function getDates()
	{
	    return ['created_at'];
	}

}
