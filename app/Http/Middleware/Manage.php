<?php namespace SNS\Http\Middleware;

use Closure;

class Manage {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if(Auth::user()->user_role > 5000) {
			return redirect()->route('home')->withErrors(['message' => trans('admin.err_500')]);
		}
		return $next($request);
	}

}
