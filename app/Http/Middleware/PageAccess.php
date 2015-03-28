<?php namespace App\Http\Middleware;

use Closure;
use App\pagepermission;
use Illuminate\Http\Request;

class PageAccess {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle(Request $request, Closure $next)
	{
		$page = pagepermission::where('path','=',$request->path())->where('user_id','=',$request->user()->id);
		if($page->count()) {

		}
		else {
			return redirect()->intended('/')
			->with('global','You have no access with this page.');
		}

		return $next($request);
	}

}
