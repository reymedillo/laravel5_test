<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model {

	protected $table = 'carts';
	protected $fillable = array('description','qty','price','total','cookie');

}
