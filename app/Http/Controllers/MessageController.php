<?php namespace App\Http\Controllers;

use App\Message;
use App\User;
use DB;
use Auth;

use Vinkla\Pusher\Facades\Pusher;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class MessageController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct() {

		$this->middleware('auth');
	}	

	public function index()
	{
		$messages = DB::table('messages')
		->leftJoin('users as recipient','messages.user_id','=','recipient.id')
		->leftJoin('users as sender','messages.sender_id','=','sender.id')
		->select('messages.id','messages.body','messages.created_at','messages.user_id','recipient.username as user_name','messages.sender_id','sender.username as sender_name')
		->orderBy('created_at','desc')
		->get();
		return response()->json($messages);
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
	public function notify() {
		$messages = DB::table('messages')
		->join('users as recipient','messages.user_id','=','recipient.id')
		->join('users as sender','messages.sender_id','=','sender.id')
		->select('messages.id','messages.body','messages.created_at','messages.user_id','recipient.username as user_name','messages.sender_id','sender.username as sender_name')
		->where('messages.status',1)
		->orderBy('created_at','desc')
		->get();

		return response()->json($messages);
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$message = Message::create(array(
			'user_id' => $request->input('user_id'),
			'body' => $request->input('body'),
			'sender_id' => $request->input('sender_id')
		));	

		$sender = User::find($message->sender_id);

		Pusher::trigger('basic_messages', 'createmsg', array(
			'id'=> $message->id,
			'body' => $request->input('body'),
			'sender_id' => $message->sender_id,
			'user_id' => Auth::user()->id,
			'sender_name' => $sender->username,
			'user_name' => Auth::user()->username,
			'created_at' => $message->created_at
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
		$messages = DB::table('messages')
		->leftJoin('users as recipient','messages.user_id','=','recipient.id')
		->leftJoin('users as sender','messages.sender_id','=','sender.id')
		->where('messages.sender_id','=',$id)
		->select('messages.id','messages.body','messages.created_at','messages.user_id','recipient.username as user_name','messages.sender_id','sender.username as sender_name')
		->get();
		return  response()->json($messages);
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
	public function update($id)
	{
		$message = Message::find($id);
		$message->status = 0;
		$message->save();
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
	public function viewall() {
		return view('message.index');
	}
}
