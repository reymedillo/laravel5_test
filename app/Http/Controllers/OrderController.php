<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\productcategory;
use App\Order;

use Illuminate\Http\Request;

class OrderController extends Controller {

public function __construct() {
	$this->middleware('guest');
}

public function index() {
	
	$prodcat = productcategory::all();
	return view('shop.index')->with('prodcat',$prodcat);
}

public function checkOut(Request $request) {
	$order = new Order;
}

}
