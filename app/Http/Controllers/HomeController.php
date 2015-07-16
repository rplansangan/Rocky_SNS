<?php namespace SNS\Http\Controllers;

use SNS\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SNS\Models\User;
use SNS\Models\Images;
use SNS\Models\Registration;
use SNS\Models\Business;
use SNS\Models\Advertise;
use SNS\Services\ValidationService;
use Illuminate\Support\Facades\Auth;
use SNS\Libraries\Facades\PostService;
use Carbon\Carbon;
use SNS\Libraries\Cache\Initialize;
use SNS\Libraries\Cache\Get;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(Initialize $init, Get $cacheGet) {
		parent::__construct($init, $cacheGet);		
	}


	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data['sub_title'] = '- Home';
		$data['left'] = 'include.superdogmenu';
		$data['right'] = 'include.right';
		$data['mid'] = 'pages.inside.lovers';
		$data['newsfeed'] = PostService::initialNewsFeed(Auth::id() , null , 20);
		return view('pages.master' , $data);
	}

	public function dogsWeek(){
		$data['sub_title'] = '- Dog of the week';
		$data['left'] = 'include.superdogmenu';
		$data['right'] = 'include.right';
		$data['mid'] = 'pages.inside.dogsofweek';
		return view('pages.master' , $data);
	}
	public function nearestPS(){
		$data['sub_title'] = '- Pet Shops';
		$data['left'] = 'include.superdogmenu';
		$data['right'] = 'include.right';
		$data['mid'] = 'pages.inside.nearestps';
		return view('pages.master' , $data);
	}
	public function nearestVet(){
		$data['sub_title'] = '- Veterinarian';
		$data['left'] = 'include.superdogmenu';
		$data['right'] = 'include.right';
		$data['mid'] = 'pages.inside.nearestvet';
		return view('pages.master' , $data);
	}
	public function missingPets(){
		$data['sub_title'] = '- Missing Pets';
		$data['left'] = 'include.superdogmenu';
		$data['right'] = 'include.right';
		$data['mid'] = 'pages.inside.missingpets';
		return view('pages.master' , $data);
	}
	public function rockyNeighbors(){
		$data['sub_title'] = '- Neighbors';
		$data['left'] = 'include.superdogmenu';
		$data['right'] = 'include.right';
		$data['mid'] = 'pages.inside.neighbors';
		return view('pages.master' , $data);
	}
	public function myUploads(){
		$data['sub_title'] = '- Videos';
		$data['left'] = 'include.superdogmenu';
		$data['right'] = 'include.right';
		$data['mid'] = 'pages.inside.myuploads';
		return view('pages.master' , $data);
	}
	public function history(){
		$data['sub_title'] = '- History';
		$data['left'] = 'include.superdogmenu';
		$data['right'] = 'include.right';
		$data['mid'] = 'pages.inside.history';
		return view('pages.master' , $data);
	}


	public function getVideo(Request $request){
		$input = array_except($request->all(), array('_token'));
		return view('ajax.video' , $input);
	}

	public function search(Request $request){
		$input = array_except($request->all(), array('_token'));
		$data['info'] = Registration::with([
			'prof_pic' => function($q){
				$q->where('pet_id' , 0);
				$q->where('is_profile_picture' , 1);
			}
		])->where('first_name' , 'LIKE' , '%'.$input['name'].'%')->orWhere('last_name' , 'LIKE' , '%'.$input['name'].'%')->get();
		return view('ajax.result' ,$data);
	}
	
}
