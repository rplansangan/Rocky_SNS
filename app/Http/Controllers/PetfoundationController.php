<?php namespace SNS\Http\Controllers;

use SNS\Http\Requests;
use SNS\Http\Controllers\Controller;
use SNS\Models\User;
use SNS\Models\Posts;
use SNS\Services\ValidationService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use SNS\Libraries\Facades\PostService;
use Carbon\Carbon;
use SNS\Libraries\Facades\StorageHelper;
use SNS\Models\Images;
use Illuminate\Support\Facades\Redirect;
use SNS\Models\PetFoundation;

use Illuminate\Http\Request;

class PetfoundationController extends Controller {

	public function __construct()
	{
		parent::__construct();
		$this->middleware('auth');
	}

	public function activate_petfoundation(Request $request){
		$input = array_except($request->all(), array('_token'));
		$validate = Validator::make($input, PetFoundation::$initialRules);
		
		if($validate->fails()) {
			return redirect()->back()
				->withInput($request->all())
				->withErrors($validate->errors()->all());
		}
	
		$foundation = new PetFoundation();
		$foundation->user_id = Auth::id();
		$foundation->petfoundation_name = $input['petfoundation_name'];
		$foundation->address_line1 = $input['address_line1'];
		$foundation->address_line2 = $input['address_line2'];
		$foundation->city = $input['city'];
		$foundation->zip = $input['zip'];
		$foundation->state = $input['state'];
		$foundation->country = $input['country'];
		$foundation->phone_country_code = $input['phone_country_code'];
		$foundation->phone_area_code = $input['phone_area_code'];
		$foundation->phone_number = $input['phone_number'];
		$foundation->email_address = $input['email_address'];
		$foundation->contact_person = $input['contact_person'];
		$foundation->petfoundation_background = $input['petfoundation_background'];
		$foundation->save();
	
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
	
			$foundation->image()->save($img_data);
	
			$file->move(storage_path('app') . '/' . $dir, $filename . '.' . $img_data->image_ext);
		}
		return redirect()->route('petfoundation');
	}

	public function pfoundationTemp(){
		return view('pages.pfpageprof');
	}

}
