<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Cart;
use Illuminate\Http\Request;
use Input;

class CartController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct() {

		$this->middleware('guest');
	}	
	public function index()
	{
		$current_session = Session::get('cart_session');
		$check_cart = Cart::where('cookie','=',$current_session)->get();
		if($check_cart) {
			return response()->json($check_cart);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$cart = Cart::create(array(
			'description' => $request->input('description'),
			'qty' => 1,
			'price' => $request->input('price'),
			'total' => $request->input('price'),
			'cookie' => Session::get('cart_session')
		));
		return response()->json(array('success' => true));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		
		$ucart = Cart::find($id);
		$ucart->qty = $request->input('qty');
		$ucart->total = $request->input('total');
		$ucart->save();
		return response()->json(array('success' => true));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
