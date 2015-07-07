<?php namespace SNS\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {

	/**
	 * The application's global HTTP middleware stack.
	 *
	 * @var array
	 */
	protected $middleware = [
		'Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode',
		'Illuminate\Cookie\Middleware\EncryptCookies',
		'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
		'Illuminate\Session\Middleware\StartSession',
		'Illuminate\View\Middleware\ShareErrorsFromSession',
		'SNS\Http\Middleware\VerifyCsrfToken',
		'Barryvdh\HttpCache\Middleware\CacheRequests',
		'Barryvdh\HttpCache\Middleware\ParseEsi',
	];

	/**
	 * The application's route middleware.
	 *
	 * @var array
	 */
	protected $routeMiddleware = [
		'auth' => 'SNS\Http\Middleware\Authenticate',
		'auth.basic' => 'Illuminate\Auth\Middleware\AuthenticateWithBasicAuth',
		'guest' => 'SNS\Http\Middleware\RedirectIfAuthenticated',
		'verified' => 'SNS\Http\Middleware\Verified',
		'manage' => 'SNS\Http\Middleware\Manage'
	];

}
