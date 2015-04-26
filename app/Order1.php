<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Order1 extends Model {

	protected $table = 'order1';
	protected $fillable = array('order_id','code','price','qty','total');

}
