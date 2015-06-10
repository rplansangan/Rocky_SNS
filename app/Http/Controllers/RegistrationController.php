<?php namespace SNS\Http\Controllers;

use Carbon\Carbon;
use SNS\Models\Registration;
use SNS\Models\Pets;
use SNS\Models\User;
use SNS\Models\Business;
use SNS\Libraries\Services\ValidationService as EmailValidationService;
use SNS\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use SNS\Libraries\Facades\StorageHelper;
use SNS\Models\Images;
use SNS\Libraries\Services\PetService;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\ValidationException;

class RegistrationController extends Controller {
	
	protected $service;
	
	public function __construct() {
		parent::__construct();
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
		
		DB::beginTransaction();
		try {
			$user = new User();
			$user->email_address = $input['email_address'];
			$user->password = Hash::make($input['password']);
			$user->user_role = 1;
			if(isset($input['user_type']) && (($input['user_type']) == 1)) {
				$user->is_member = 1;
			}
			if(isset($input['user_type']) && (($input['user_type']) == 2)) {
				$user->is_merchant = 1;
			}
			if(isset($input['user_type']) && (($input['user_type']) == 3)) {
				$user->is_foundation = 1;
			}
			if(isset($input['user_type']) && (($input['user_type']) == 4)) {
				$user->is_vet = 1;
			}
			$user->is_deactivated = 0;
			$user->is_validated = 0;
			$user->save();
		} catch (ValidationException $e) {
			DB::rollback();
			return redirect()->back()
					->withInput($request->all())
					->withErrors($e->errors());
		}

		try {
			$reg = new Registration();
			$reg->email_address = $input['email_address'];
			$reg->last_name = $input['last_name'];
			$reg->first_name = $input['first_name'];
			$reg->gender = $input['gender'];
			$reg->user_id = $user->user_id;
			$reg->is_deactivated = 0;
			$reg->is_validated = 0;
			$reg->save();
		} catch(ValidationException $e) {
			DB::rollback();
			return redirect()->back()
					->withInput($request->all())
					->withErrors($e->errors());
		}		
		DB::commit();
		
		//disabled until ?
		//$service = new EmailValidationService();
		//$service->id($reg->registration_id)->createEmailToken();
		Auth::loginUsingId($user->user_id);
		//return view('pages.message')->with('id', $reg->registration_id)->with('validation_errors', null);
		return redirect()->route('register.add_pet');
	}
	
	public function validateRegistration($id, $hash) {	
		$service = new EmailValidationService();
		$service->id($id)->hash($hash)->validateEmailToken();
		
// 		if($service->errors()) {		
// 			return redirect()->route('pages.message')->withErrors(['message' => $service->errors()]);
// 		} else {
// 			$service->activateRegistration();
// 			$service->deleteHash();
// 			return redirect()->route('register.details', $id);
// 		}
		if(Auth::check()) {
			return redirect()->route('home');
		} else {
			return redirect()->route('index');
		}
	}
	
	public function details($id) {
		Session::put('details', Registration::find($id)->toArray());
		return view('pages.register');
	}
	
	public function updateDetails(Request $request, $id) {
		Session::forget('details');
		$input = array_except($request->all(), array('_token'));
		
		DB::beginTransaction();
		if($input) {
			try {
				$reg = Registration::find($id);
				while(($current = current($input)) ==! FALSE)  {
					$reg->{key($input)} = current($input);
					next($input);
				}
				$reg->save();
			} catch (ValidationException $e) {
				DB::rollback();
				return redirect()->back()
						->withInput($request->all())
						->withErrors($e->errors());
			}
		}	
		
		if($request->file('userfile') != null) {
			try {
				$file = $request->file('userfile');
				$filename = md5($file->getClientOriginalName() . Auth::user()->email_address . Carbon::now());
				$dir = StorageHelper::create(Auth::id());
				
				$img_data = new Images(array(
						'user_id' => $reg->registration_id,
						'image_path' => $dir,
						'image_name' => $filename,
						'image_mime' => $file->getMimeType(),
						'image_ext' => $file->getClientOriginalExtension(),
						'is_profile_picture' => 1
				));
				
				$img_data->save();
				
				$file->move(storage_path('app') . '/' . $dir, $filename . '.' . $img_data->image_ext);
			} catch(ValidationException $e) {
				DB::rollback();
				return redirect()->back()
						->withInput($request->all())
						->withErrors($e->errors());
			}
// 			StorageHelper::store($dir, $filename, $file);
		}		
		DB::commit();
		Auth::loginUsingId($reg->user->user_id);
				
		return redirect()->route('home');
		
	}
	
	public function resend($id) {
		$service = new EmailValidationService();
		$service->id($id)->resendEmailToken();
			
		return view('pages.message')->with('id', $id)->with('validation_errors', null);
	}


	public function validateMessage(){
		return view('pages.message');
	}

	public function registerpet() {
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
		
		DB::beginTransaction();
		try {		
			$pet = new Pets();
			$pet->user_id = Auth::id();
			$pet->rocky_tag_no = $input['rocky_tag_no'];
			$pet->pet_name = $input['pet_name'];
			$pet->pet_type = $input['pet_type'];
			$pet->breed = $input['breed'];
			$pet->pet_bday = $input['pet_bday'];
			$pet->pet_gender = $input['pet_gender'];
			$pet->food = $input['food'];
			$pet->food_style = $input['food_style'];
			$pet->pet_likes = $input['pet_likes'];
			$pet->pet_dislikes = $input['pet_dislikes'];
			$pet->brand = $input['brand'];
			$pet->weight = $input['weight'];
			$pet->height = $input['height'];
			$pet->behavior = $input['behavior'];
			$pet->feeding_interval = $input['feeding_interval'];
			$pet->feeding_time = $input['feeding_time'];
			$pet->save();
		} catch (ValidationException $e) {
			DB::rollback();
			return redirect()->back()
					->withInput($request->all())
					->withErrors($e->errors());
		}
		
		if($request->file('petfile')) {
			try {
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
				
				$pet->profile_pic()->save($img_data);
			
				$file->move(storage_path('app') . '/' . $dir, $filename . '.' . $img_data->image_ext);
			} catch (ValidationException $e) {
				DB::rollback();
				return redirect()->back()
						->withInput($request->all())
						->withErrors($e->errors());
			}
		}
		
		DB::commit();
		return redirect()->route('profile.petlist', Auth::id());
	}
	
	public function refreshPetFields(Request $r) {
		switch($r->get('action')) {
			case 'behavior':
				return $this->getPetBehavior($r->get('id'));
				break;
			case 'food':
				return $this->getFoodBrands($r->get('id'));
				break;
		}
	}
	

	protected function getPetBehavior($id) {
		$q = new PetService();
		$q->select(array('id', 'behavior'))->where('animal_type_id', $id)->orderBy('behavior', 'asc')->listPetBehavior();
		
		$q->setId('id');
		$q->setLabel('behavior');
		$q->setFormName('behavior');
		return $q->formatAsSelect();
	}
	
	protected function getFoodBrands($id) {
		$q = new PetService();
		$q->select(array('id', 'brand_name'))->where('animal_type_id', $id)->orderBy('brand_name', 'asc')->listFoodBrand();
		
		$q->setId('id');
		$q->setLabel('brand_name');
		$q->setFormName('brand');
		return $q->formatAsSelect();
	}

	public function checkemail(Request $request){
		$input = array_except($request->all(), array('_token'));
		echo Registration::where('email_address' , $input['email'])->count();
	}
	
	public function registerPetOpt() {
		return view('pages.registration.pet');
	}
		
}