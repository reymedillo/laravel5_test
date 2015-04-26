<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\productcategory;
use App\Order1;
use App\Orders;
use App\Cart;
use Input;

use Illuminate\Http\Request;

class OrderController extends Controller {

public function __construct() {
	$this->middleware('guest');
}

public function home() {
	
	$prodcat = productcategory::all();
	return view('shop.index')->with('prodcat',$prodcat);
}
public function index() {
}

public function checkout(Request $request) {
	$header = new Orders;
	$header->name = 'rey';
	$header->total = $request->input('netTotal');
	$header->save();

	for($i=0;$i<count($request->input('cartDesc'));$i++) {
		$order = new Order1;
		$order->order_id = $header->id;
		$order->code = $request->input('cartDesc')[$i];
		$order->price = $request->input('cartPrc')[$i];
		$order->qty = $request->input('cartQty')[$i];
		$order->total = $request->input('cartTotal')[$i];
		$order->save();
		$cart = Cart::find($request->input('cartId')[$i]);
		$cart->delete();
	}
}

}
