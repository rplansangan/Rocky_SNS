<?php namespace SNS\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Verified {
	
	protected $auth;

	public function __construct(Guard $auth) {
		$this->auth = $auth;
	}
	
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		// only allow guests
		if($this->auth->check()) {
			// check if is_validated is true
			if($this->auth->user()->is_validated == 1) {
				// redirect user to home
				return redirect()->route('home');
			}
		}		
		return $next($request);
	}

}
