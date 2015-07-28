<?php namespace SNS\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class checkPet {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if(Auth::check()){
			if(!Auth::user()->pets->count()){
				return redirect()->route('add.pet');
			}
		}
		
		return $next($request);
	}

}
