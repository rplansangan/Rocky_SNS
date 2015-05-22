<?php namespace SNS\Http\Controllers;

use SNS\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SNS\Models\User;
use SNS\Models\Images;
use SNS\Models\Business;
use SNS\Models\Advertise;
use SNS\Services\ValidationService;
use Illuminate\Support\Facades\Auth;
use SNS\Libraries\Facades\PostService;
use Carbon\Carbon;


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
	public function __construct()
	{
		parent::__construct();
		$this->middleware('auth');
	}


	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		User::where('user_id' , Auth::id())->update(['last_post' => Carbon::now()]);
		$data['newsfeed'] = PostService::initialNewsFeed(Auth::id());
		return view('pages.homepage', $data);
	}

	public function map(){
		return view('pages.mypet');
	}

	public function pet_of_the_day(){
		return view('pages.petoftheday');
	}
	public function trending(){
		return view('pages.trending');
	}
	public function shop(Request $request){
		$country = $request->input('country');
		$type = $request->input('type');
		$state = $request->input('state_ads');
		$zip = $request->input('zip_ads');
		if($request->input('search') == 'SEARCH'){
			$data['info'] = Business::with(array('advertise.post' , 'advertise.post.image',
				'advertise' => function($q) use($type){
						if($type){
							$q->where('type' , $type);
						}
					}
				))->where('state'  , 'LIKE' , '%'.$state.'%')->where('country' , $country)->where('zip' , 'LIKE' , '%'.$zip.'%')->get();
			return view('pages.shop' , $data);
		}else{
			$data['info'] = Business::with(array('advertise' ,'advertise.post' , 'advertise.post.image'))->latest()->get();
			return view('pages.shop' , $data);	
		}
	}
	public function trackers(){
		return view('pages.trackers');
	}
	public function search(){
		return view('pages.search');
	}

	public function addadvertise(){
		return view('pages.addadvertise');
	}

	public function compete(){
	
		return view('pages.compete');
	}
	public function videos(Request $request){
		if($request->input('search') == null){
			$data['video'] = Images::select(array('image_id', 'image_mime', 'post_id', 'user_id', 'image_title', 'category'))
								->with(array(
									'post' => function($q) {
										$q->addSelect(array('post_id', 'post_message', 'post_tags'));
									}, 
									'register' => function($q) {
										$q->addSelect(array('registration_id', 'user_id', 'first_name', 'last_name'));
									}
								))->where('image_mime' , 'like' , '%video%')->latest()->get();
			
			$data['status'] = "Latest Videos";
			return view('pages.videos' , $data);
		}else{
			$data['status'] = "Latest Videos";
			$data['video'] = Images::select(array('image_id', 'image_mime', 'post_id', 'user_id', 'image_title', 'category'))
								->with(array(
									'post' => function($q) {
										$q->addSelect(array('post_id', 'post_message', 'post_tags'));
									}, 
									'register' => function($q) {
										$q->addSelect(array('registration_id', 'user_id', 'first_name', 'last_name'));
									}
								))
								->where('image_title' , 'like' , '%'.$request->input('search').'%')
								->orWhere('category' , 'like' , '%'.$request->input('search').'%')
								->having('image_mime' , 'like' , '%video%')
								->latest()->get();
			return view('pages.videos' , $data);
		}
	}
	public function myvideo(){
		$data['status'] = "My Videos";
		$data['video'] = Images::select(array('image_id', 'image_mime', 'post_id', 'user_id', 'image_title', 'category'))
								->with(array(
									'post' => function($q) {
										$q->addSelect(array('post_id', 'post_message', 'post_tags'));
									}, 
									'register' => function($q) {
										$q->addSelect(array('registration_id', 'user_id', 'first_name', 'last_name'));
									}
								))
								->where('image_mime' , 'like' , '%video%')
								->where('user_id' , Auth::id())
								->latest()->get();
		return view('pages.videos' , $data);
	}
	public function rockyranger(){
		return view('pages.rockyranger');
	}

	public function petfoundation(){
		return view('pages.petfoundation');
	}

	public function foundPets(){
		return view('pages.foundpet');
	}

	public function missingPets(){
		return view('pages.missingpet');
	}

	public function vetTemp(){
		return view('pages.veterinary');
	}

	public function vetProfile(){
		return view('pages.vetprof');
	}
}
