<?php namespace SNS\Http\Controllers\Admin;

use SNS\Http\Requests;
use SNS\Http\Controllers\Admin\Controller;

use Illuminate\Http\Request;
use SNS\Models\User;
use SNS\Models\Posts;
use SNS\Models\Comments;
use SNS\Models\Likes;
use SNS\Models\Images;
use SNS\Models\PetFoundation;
use SNS\Models\Pets;
use SNS\Models\Admin\ErrorLogs;

class DashboardController extends Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function main() {
		return view('admin.main');
	}
	
	public function statsOverview() {
		$stats['app_ver'] = app()->version();
		$stats['users'] = User::count();
		$stats['posts'] = Posts::count();
		$stats['photos'] = Images::count();
		$stats['comments'] = Comments::count();
		$stats['likes'] = Likes::count();
		$stats['pets'] = Pets::count();
		$stats['pet_foundations'] = PetFoundation::count();
		
		return view('admin.stats.overview',['stats' => $stats]);
	}
	
	public function listUsers() {
		$col = User::select([
					'user_id',
					'email_address',
					'user_role',
					'is_deactivated',
					'is_validated',
					'created_at'
			])->with([
				'registration' => function($q) {
					$q->addSelect(['user_id', 'first_name', 'last_name']);
				}
			])->paginate(25);
		// fix for trailing slash
		$col->setPath('');		
		return view('admin.listing.user', ['list' => $col]);
	}
	
	public function listErrors() {
	    $col = ErrorLogs::select(['id', 'from_user', 'route_name', 'error_code', 'error_msg', 'created_at'])->orderBy('id', 'desc')->paginate(25);
	    $col->setPath('');
	    return view('admin.listing.errors', ['list' => $col]);
	}
	
	public function displaySingleError($id) {
	    $err = ErrorLogs::find($id);
	    
	    return view('admin.single.error_stack_trace', ['error' => $err]);
	}
	
	public function userData($uid) {
		$data = User::find($uid);
		$data->load(['registration', 'pets' => function($q) { $q->count(); }, 'posts', 'images']);
		
		dd($data);
	}

}
