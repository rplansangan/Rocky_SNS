<?php namespace SNS\Http\Controllers;

use SNS\Models\Registration;
use SNS\Models\Pets;
use SNS\Models\User;
use SNS\Models\Business;
use SNS\Services\ValidationService;
use SNS\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use SNS\Libraries\Facades\StorageHelper;
use SNS\Models\Images;
use Carbon\Carbon;

class RegistrationController extends Controller {
	
	protected $service;
	
	public function __construct() {
		parent::__construct();
		$this->service = new ValidationService();
// 		$this->middleware('guest');
	}
	
	public function register(Request $request) {
		$input = array_except($request->all(), array('_token'));
		$validate = Validator::make($input, Registration::$initialRules);
		
		if($validate->fails()) {
			return redirect()->back()
				->withInput($request->all())
				->withErrors($validate->errors()->all());
		}

		$user = new User();
		$user->email_address = $input['email_address'];
		$user->password = Hash::make($input['password']);
		$user->role_id = 1;
		$user->is_deactivated = 0;
		$user->is_validated = 0;
		$user->save();
		
		$reg = new Registration();
		$reg->email_address = $input['email_address'];
		$reg->last_name = $input['last_name'];
		$reg->first_name = $input['first_name'];
		$reg->birth_date = $input['birth_date'];
		$reg->gender = $input['gender'];
		$reg->user_id = $user->user_id;
		$reg->is_deactivated = 0;
		$reg->is_validated = 0;
		$reg->save();		
		
// 		$data['auth'] = false;
		$this->service->send($reg);
		
		return view('pages.message')->with('id', $user->user_id)->with('validation_errors', null);
	}
	
	public function validateRegistration($id, $hash) {	
		$service = $this->service->confirm($id, $hash);
				
		if($service->check()) {
			$this->service->deleteHash($id, $hash);
			return redirect()->route('register.details', $id);
		} else {
			return view('pages.message')->with('validation_errors', $service->errors)->with('id', $id);
		}
	}
	
	public function details($id) {
		Session::put('details', Registration::find($id)->toArray());
// 		$data['auth'] = false;
		return view('pages.register');
	}
	
	public function updateDetails(Request $request, $id) {

		Session::forget('details');
		$input = array_except($request->all(), array('_token'));
		
		if($input) {
			$reg = Registration::find($id);
			while(($current = current($input)) ==! FALSE)  {
				$reg->{key($input)} = current($input);
				next($input);
			}
			$reg->save();
		}	

		Auth::loginUsingId($reg->registration_id);
		
		return redirect()->route('home');
		
	}
	
	public function resend($id) {
		$service = $this->service->resend($id);
		
		if($service->check()) {			
// 			$data['auth'] = false;
			return view('pages.message')->with('id', $id)->with('validation_errors', null);
		} else {
			return redirect('/');
		}		
	}


	public function validateMessage(){
// 		$data['auth'] = false;
		return view('pages.message');
	}

	public function registerpet() {
// 		$data['auth'] = true;
		return view('pages.petregister');
	}
	
	public function petRegister(Request $request) {
		$input = array_except($request->all(), array('_token'));
		$validate = Validator::make($input, Pets::$initialRules);

		if($validate->fails()){
			return redirect()->back()
			->withInput($request->all())
			->withErrors($validate->errors()->all());
		}
		
		$pet = new Pets();
		$pet->user_id = Auth::id();
		$pet->pet_name = $input['pet_name'];
		$pet->pet_type = $input['pet_type'];
		$pet->breed = $input['breed'];
		$pet->pet_bday = $input['pet_bday'];
		$pet->pet_gender = $input['pet_gender'];
		$pet->food = $input['food'];
		$pet->pet_likes = $input['pet_likes'];
		$pet->pet_dislikes = $input['pet_dislikes'];
		$pet->save();
		
		if($request->has('petfile')) {
			$file = $request->file('petfile');
			$filename = md5($file->getClientOriginalName() . Auth::user()->email_address . Carbon::now());
			$dir = StorageHelper::create(Auth::id());
			
			$img_data = new Images(array(
					'user_id' => Auth::id(),
					'image_path' => $dir,
					'image_name' => $filename,
					'image_mime' => $file->getMimeType(),
					'image_ext' => $file->getClientOriginalExtension(),
					'is_profile_picture' => 1
			));
			
			$pet->image()->save($img_data);
			
			$file->move(storage_path('app') . '/' . $dir, $filename . '.' . $img_data->image_ext);
		}
		return redirect()->route('profile.petlist', Auth::id());
	}
}
