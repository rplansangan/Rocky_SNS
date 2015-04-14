<?php namespace SNS\Http\Controllers;

use SNS\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SNS\Models\Registration;
use SNS\Models\Business;
use SNS\Models\User;
use SNS\Models\Advertise;
use SNS\Models\Posts;
use SNS\Services\ValidationService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use SNS\Libraries\Facades\PostService;
use SNS\Libraries\Facades\FriendService;
use Carbon\Carbon;
use SNS\Libraries\Facades\StorageHelper;
use SNS\Models\Images;

class MerchantController extends Controller {
	
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
	public function show_advertise_view(){
	    $user = new User();
	    $ind = $user->isMerc(Auth::id())->get();
		$data['auth'] = true;
		if(!$ind->isEmpty()){
			return view('pages.merchantprofile' , $data);
		}else{
			return view('pages.check' , $data);
		}
		
	}

	public function merchant_activation(){
		$data['auth'] = true;
		return view('pages.advertise' , $data);
	}
	
	public function activate_merchant(Request $request){
		$input = array_except($request->all(), array('_token'));
		$validate = Validator::make($input, Business::$initialRules);
		
		if($validate->fails()) {
			return redirect()->back()
				->withInput($request->all())
				->withErrors($validate->errors()->all());
		}
	
		$merchant = new Business();
		$merchant->user_id = Auth::id();
		$merchant->business_name = $input['business_name'];
		$merchant->address_line1 = $input['address_line1'];
		$merchant->address_line2 = $input['address_line2'];
		$merchant->city = $input['city'];
		$merchant->zip = $input['zip'];
		$merchant->state = $input['state'];
		$merchant->country = $input['country'];
		$merchant->phone_country_code = $input['phone_country_code'];
		$merchant->phone_area_code = $input['phone_area_code'];
		$merchant->phone_number = $input['phone_number'];
		$merchant->email_address = $input['email_address'];
		$merchant->contact_person = $input['contact_person'];
		$merchant->company_background = $input['company_background'];
		$merchant->save();
	
		User::where('user_id' , '=' , Auth::id())->update(['is_merchant' => 1]);
	
		if(isset($input['myfile'])) {
			$file = $input['myfile'];
			$filename = md5($file->getClientOriginalName() . Auth::user()->email_address . Carbon::now());
			$dir = StorageHelper::create(Auth::id());
	
			$img_data = new Images(array(
					'user_id' => Auth::id(),
					'image_path' => $dir,
					'image_name' => $filename,
					'image_mime' => $file->getMimeType(),
					'image_ext' => $file->getClientOriginalExtension(),
					'is_profile_picture' => 0
			));
	
			$merchant->image()->save($img_data);
	
			$file->move(storage_path('app') . '/' . $dir, $filename . '.' . $img_data->image_ext);
		}
		return redirect()->route('addadvertise');
	}

	public function add_advertisement(Request $request){
		$input = array_except($request->all(), array('_token'));
		$validate = Validator::make($input, Advertise::$initialRules);

		if($validate->fails()) {
			return redirect()->back()
				->withInput($request->all())
				->withErrors($validate->errors()->all());
		}

		$advertise = new Advertise();
		$advertise->user_id = Auth::id();
		$advertise->type = $input['type'];
		$advertise->title = $input['title'];
		$advertise->save();

		$post = new Posts();
		$post->post_message = $input['message'];
		$post->user_id = Auth::id();
		$advertise->post()->save($post);

		if(isset($input['userfile'])) {
			$file = $input['userfile'];
			$filename = md5($file->getClientOriginalName() . Auth::user()->email_address . Carbon::now());
			$dir = StorageHelper::create(Auth::id());
	
			$img_data = new Images(array(
					'user_id' => Auth::id(),
					'image_path' => $dir,
					'image_name' => $filename,
					'image_mime' => $file->getMimeType(),
					'image_ext' => $file->getClientOriginalExtension(),
					'is_profile_picture' => 0
			));
	
			$advertise->image()->save($img_data);
	
			$file->move(storage_path('app') . '/' . $dir, $filename . '.' . $img_data->image_ext);
		}
		if(User::find(Auth::id())->is_merchant == 1){
			return redirect()->route('test2');
		}else{
			return redirect()->route('profile.advertised' , array("id" => Auth::id() , "advertised_id" => $advertise->id) );
		}
		
		
	}


	public function showAdvertised($user_id , $advertise_id){
		$data['profile'] = Registration::find($user_id);

		$data['post'] = Advertise::where('user_id', $user_id)
				->where('id', $advertise_id)
				->with(array('post' , 'image'))->get();

		$data['like'] = Posts::where('user_id', $user_id)
				->where('advertise_id', $advertise_id)
				->with(array('like' , 'comment'))->get();		
		$data['auth'] = true;	
		$data['friend_flags'] = FriendService::check($user_id);	
		return view('profile.individual' , $data);
	}

	public function viewAdform(){
		$data['auth'] = true;
		return view('pages.addadvertise', $data);
	}

}
