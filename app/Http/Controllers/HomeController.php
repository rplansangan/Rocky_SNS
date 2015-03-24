<?php namespace SNS\Http\Controllers;

use SNS\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SNS\Services\ValidationService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data['auth'] = true;
		return view('pages.homepage' , $data);
	}

	public function map(){
		$data['auth'] = true;
		return view('pages.mypet' , $data);
	}

	public function pet_of_the_day(){
		$data['auth'] = true;
		return view('pages.petoftheday' , $data);
	}
	public function trending(){
		$data['auth'] = true;
		return view('pages.trending' , $data);
	}
	public function advertised(){
		$data['auth'] = true;
		return view('pages.advertise' , $data);
	}
	public function shop(){
		$data['auth'] = true;
		return view('pages.shop' , $data);
	}
	public function trackers(){
		$data['auth'] = true;
		return view('pages.trackers' , $data);
	}

	public function test(Request $request){
		$input = array_except($request->all(), array('_token'));
		?>
		<li class="media">
			<div class="media-left">
				<a href="#">
					<img class="media-object" src="{{ URL::asset('assets/images/browncat.png') }}" withd="64px" height="64px" alt="profile picture">
				</a>
			</div>
			<div class="media-body">
				<h4 class="media-heading">Superdog</h4>
				<small class="media-heading">March 18 2015 12:00:00 am</small>
				<p><?php echo $input['post_message']?></p>
				<p><a href="#"><i class="fa fa-thumbs-up"></i> 1 Likes....</a> <a href="javascript:void(0)">Comment</a></p>
				<form method="POST" action="{{ url('login') }}"  role="form" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<textarea max="500" name="post_message" class="comment-box" placeholder=" Say Something..."></textarea>
				</form>	
			</div>
		</li>
		<?php
	}
}
