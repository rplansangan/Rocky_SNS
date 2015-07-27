<?php namespace SNS\Http\Controllers;

use SNS\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SNS\Models\Registration;
use SNS\Models\Business;
use SNS\Models\User;
use SNS\Models\Advertise;
use SNS\Models\Posts;
use SNS\Models\AdvertiseOrder;
use SNS\Services\ValidationService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use SNS\Libraries\Facades\PostService;
use SNS\Libraries\Facades\FriendService;
use Carbon\Carbon;
use SNS\Libraries\Facades\StorageHelper;
use SNS\Models\Images;
use Illuminate\Support\Facades\DB;
use SNS\Libraries\Cache\Initialize;
use SNS\Libraries\Cache\Get;

class MerchantController extends Controller {
	
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(Initialize $init, Get $cacheGet) {
		parent::__construct($init, $cacheGet);
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function show_advertise_view(){
	    $user = User::find(Auth::id());
	    $user->load('business');
		if(isset($user->business->business_id)){
			return redirect()->route('merchant.profile', Auth::id());
		}else{
			return view('pages.mercharegister');
		}
	}

	public function merchantProf($id){
		$user = User::select(array('user_id'))->find($id);
		$user->load([
			'adverts',
			'bsns_reg',
			'adverts.post',
			'adverts.post.image'
		]);
				
		if($user->adverts->isEmpty()) {		
			return redirect()->route('addadvertise');
		}
				
		$data['details'] = $user->adverts[0];
		$data['otherads'] = array_except($user->adverts, array(0));
		$data['info'] = $user->bsns_reg;

		return view('pages.merchantprofile', $data);
	}

	public function merchant_activation(){
		return view('pages.advertise');
	}
	
	public function activate_merchant(Request $request){
		$input = array_except($request->all(), array('_token'));
		$validate = Validator::make($input, Business::$initialRules);
		
		if($validate->fails()) {
			return redirect()->back()
				->withInput($request->all())
				->withErrors($validate->errors()->all());
		}
	
		DB::beginTransaction();
		try {
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
		} catch (\Exception $e) {
			DB::rollback();
			return redirect()->back()
					->withInput($request->except(['_token']))
					->withErrors(['message' => trans('errors.err_500')]);
		}
	
		User::where('user_id' , '=' , Auth::id())->update(['is_merchant' => 1]);
	
		try {
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
		} catch (\Exception $e) {
			DB::rollback();
			return redirect()->back()
					->withInput($request->except(['_token']))
					->withErrors(['message' => trans('errors.err_500')]);
		}
		DB::commit();
		return redirect()->route('addadvertise');
	}

	public function add_advertisement(Request $request){
		$input = array_except($request->all(), ['_token']);
		$validate = Validator::make($input, Advertise::$initialRules);

		if($validate->fails()) {
			return redirect()->back()
				->withInput($request->all())
				->withErrors($validate->errors()->all());
		}
		
		DB::beginTransaction();
		try {
			$advertise = new Advertise();
			$advertise->user_id = Auth::id();
			$advertise->type = $input['type'];
			$advertise->title = $input['title'];
			$advertise->save();
		} catch (\Exception $e) {
			DB::rollback();
			return redirect()->back()
					->withInput($request->except(['_token']))
					->withErrors(['message' => trans('errors.err_500')]);
		}

		try {
			$post = new Posts();
			$post->post_message = $input['message'];
			$post->user_id = Auth::id();
			$advertise->post()->save($post);
		} catch (\Exception $e) {
			DB::rollback();
			return redirect()->back()
			->withInput($request->except(['_token']))
			->withErrors(['message' => trans('errors.err_500')]);
		}
		
		if(isset($input['userfile'])) {
			$file = $input['userfile'];
			$filename = md5($file->getClientOriginalName() . Auth::user()->email_address . Carbon::now());
			$dir = StorageHelper::create(Auth::id());
			try {
				$img_data = new Images([
						'user_id' => Auth::id(),
						'image_path' => $dir,
						'image_name' => $filename,
						'image_mime' => $file->getMimeType(),
						'image_ext' => $file->getClientOriginalExtension(),
						'is_profile_picture' => 0
				]);
				
				$advertise->post->image()->save($img_data);
			} catch (\Exception $e) {
				DB::rollback();
				return redirect()->back()
					->withInput($request->except(['_token']))
					->withErrors(['message' => trans('errors.err_500')]);
			}			
	
			$file->move(storage_path('app') . '/' . $dir, $filename . '.' . $img_data->image_ext);
		}
		
		DB::commit();
		
		if(User::find(Auth::id())->is_merchant == 1){
			return redirect()->route('merchant.profile', [Auth::id()]);
		}
		elseif(User::find(Auth::id())->is_member == 1){
			return redirect()->route('profile.advertised', ["id" => Auth::id() , "advertised_id" => $advertise->id]);
		}
		
		
	}


	public function showAdvertised($user_id , $advertise_id){
		$data['profile'] = Registration::find($user_id);

		$data['post'] = Advertise::where('user_id', $user_id)
				->where('id', $advertise_id)
				->with(['post', 'image'])->get();
	
		$data['friend_flags'] = FriendService::check($user_id);	

		return view('profile.individual', $data);
	}

	public function viewAdform(){
		return view('pages.addadvertise');
	}

	public function addOrderInquire(Request $request){
		$input = array_except($request->all(), ['_token']);
		$validate = Validator::make($input, AdvertiseOrder::$initialRules);

		if($validate->fails()) {
			return redirect()->back()
				->withInput($request->all())
				->withErrors($validate->errors()->all());
		}

		$order = new AdvertiseOrder();
		$order->advertise_id = $input['id'];
		$order->message = $input['message'];
		$order->type = $input['type'];
		$order->save();

	}

	public function merch_adview($id, $advertise_id){
		$user = User::select(['user_id'])->find($id);
		$user->load([
			'adverts' => function($q) use($advertise_id) {
				$q->addSelect(array('id', 'user_id', 'title' , 'type', 'created_at'))->where('id' , $advertise_id);
			},
			'otheradd' => function($q) use($advertise_id){
				$q->addSelect(array('id', 'user_id', 'title' , 'type', 'created_at'))->where('id' , '!=' , $advertise_id);
			},
			'bsns_reg',
			'adverts.post' => function($q) {
				$q->addSelect(array('user_id', 'post_id', 'post_message', 'advertise_id', 'created_at'));
			},
			'adverts.post.image' => function($q) {
				$q->addSelect(array('user_id', 'image_id', 'post_id'));
			},
			'otheradd.post.image' => function($q) {
				$q->addSelect(array('user_id', 'image_id', 'post_id'));
			}
		]);
				
		$data['details'] = $user->adverts[0];
		$data['otherads'] = $user->otheradd;
		$data['info'] = $user->bsns_reg;


		return view('pages.merchantprofile', $data);
	}

}
