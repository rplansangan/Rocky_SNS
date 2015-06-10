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
use SNS\Libraries\Traits\ProfPicTrait;
use SNS\Models\PetAdoption;
use SNS\Models\PetFoundationImages;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\ValidationException;

class PetfoundationController extends Controller {

	use ProfPicTrait;
	
	public function __construct()
	{
		parent::__construct();
		$this->middleware('auth');
	}
	
	public function petfoundation(){
		if(Auth::user()->is_foundation == 1) {
			$foundation = Auth::user()->foundation;
			return view('pages.pet_foundation.edit', ['details' => $foundation]);
		} else {
			return view('pages.petfoundation');
		}		
	}
	
	public function registerView() {
		return view('pages.pet_foundation.register');
	}

	public function activate_petfoundation(Request $request){
		$input = array_except($request->all(), array('_token'));
		$validate = Validator::make($input, PetFoundation::$initialRules);
		
		if($validate->fails()) {
			return redirect()->back()
				->withInput($request->all())
				->withErrors($validate->errors()->all());
		}
	
		DB::beginTransaction();
		try {
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
			$foundation->mission_statement = $input['mission_statement'];
			$foundation->vision_statement = $input['vision_statement'];
			$foundation->goal_statement = $input['goal_statement'];
			$foundation->save();
		} catch (ValidationException $e) {
			DB::rollback();
			return redirect()->back()
					->withInput($request->all())
					->withErrors($e->errors());	
		} catch (\Exception $e) {
			DB::rollback();
			return redirect()->back()
					->withInput($request->all())
					->withErrors(['message' => trans('errors.err_500')]);
		}
		
		User::where('user_id' , '=' , Auth::id())->update(['is_merchant' => 1]);
	
		if(isset($input['myfile'])) {
			$file = $input['myfile'];
			$filename = md5($file->getClientOriginalName() . Auth::user()->email_address . Carbon::now());
			$dir = StorageHelper::create(Auth::id());
			try {
				$img_data = new Images(array(
						'user_id' => Auth::id(),
						'image_path' => $dir,
						'image_name' => $filename,
						'image_mime' => $file->getMimeType(),
						'image_ext' => $file->getClientOriginalExtension(),
						'is_profile_picture' => 0
				));
		
				$foundation->image()->save($img_data);
			} catch (ValidationException $e) {
				DB::rollback();
				return redirect()->back()
					->withInput($request->all())
					->withErrors($e->errors());
			} catch (\Exception $e) {
				DB::rollback();
				return redirect()->back()
					->withInput($request->all())
					->withErrors(['message' => trans('errors.err_500')]);
			}
	
			$file->move(storage_path('app') . '/' . $dir, $filename . '.' . $img_data->image_ext);
		}
		
		DB::commit();
		
		return redirect()->route('profile.showProfile', [Auth::id()]);
	}
	
	public function editFoundation(Request $request) {
		$input = array_except($request->all(), ['_token']);
		
		DB::beginTransaction();
		
		try {
			$foundation = Auth::user()->foundation;
			$foundation->petfoundation_name = $input['petfoundation_name'];
			$foundation->email_address = $input['email_address'];
			$foundation->contact_person = $input['contact_person'];
			$foundation->address_line1 = $input['address_line1'];
			$foundation->address_line2 = $input['address_line2'];
			$foundation->city = $input['city'];
			$foundation->zip = $input['zip'];
			$foundation->state = $input['state'];
			$foundation->country = $input['country'];
			$foundation->phone_area_code = $input['phone_area_code'];
			$foundation->phone_country_code = $input['phone_country_code'];
			$foundation->phone_number = $input['phone_number'];
			$foundation->petfoundation_background = $input['petfoundation_background'];
			$foundation->mission_statement = $input['mission_statement'];
			$foundation->vision_statement = $input['vision_statement'];
			$foundation->goal_statement = $input['goal_statement'];
			$foundation->save();
		} catch (ValidationException $e) {
			DB::rollback();
			return redirect()->back()
			->withInput($request->all())
			->withErrors($e->errors());
		} catch (\Exception $e) {
			DB::rollback();
			return redirect()->back()
			->withInput($request->all())
			->withErrors(['message' => trans('errors.err_500')]);
		}
		
		if(isset($input['myfile'])) {
			$file = $input['myfile'];
			$filename = md5($file->getClientOriginalName() . Auth::user()->email_address . Carbon::now());
			$dir = StorageHelper::create(Auth::id());
			try {
				$img_data = new Images(array(
						'user_id' => Auth::id(),
						'image_path' => $dir,
						'image_name' => $filename,
						'image_mime' => $file->getMimeType(),
						'image_ext' => $file->getClientOriginalExtension(),
						'is_profile_picture' => 1
				));
			
				$this->removePreviousFoundation($foundation->petfoundation_id);
				
				$foundation->image()->save($img_data);
			} catch (ValidationException $e) {
				DB::rollback();
				return redirect()->back()
					->withInput($request->all())
					->withErrors($e->errors());
			} catch (\Exception $e) {
				DB::rollback();
				return redirect()->back()
					->withInput($request->all())
					->withErrors(['message' => trans('errors.err_500')]);
			}
			$file->move(storage_path('app') . '/' . $dir, $filename . '.' . $img_data->image_ext);
		}
		
		DB::commit();
		
		return redirect()->route('petfoundation');
	}

	public function showAll() {
		$col = PetFoundation::select(['petfoundation_id', 'petfoundation_name', 'user_id'])->latest()->get();
		$col->load([
				'prof_pic' => function($q) {
					$q->addSelect(['image_id', 'foundation_id']);
					$q->where('is_profile_picture', 1);
					$q->where('adoption_id', 0);
				}
		]);
		return view('pages.pet_foundation.list', ['list' => $col]);
	}
	
	public function pfoundationTemp(){
		return view('pages.pfpageprof');
	}

	public function adoptList($foundation_id){
		$collection = PetAdoption::select(['pa_id', 'pet_name', 'background', 'foundation_id'])
						->with([
							'prof_pic' => function($q) {
								$q->where('is_profile_picture', 1);
								$q->addSelect(['image_id', 'user_id', 'adoption_id']);
							},
						])
						->where('foundation_id', $foundation_id)
						->get();
		
		$foundation = Auth::user()->foundation;
		
		if($foundation == null) {
			$adopt_btn = false;
		} elseif($foundation->petfoundation_id != $foundation_id) {
			$adopt_btn = false;
		} else {
			$adopt_btn = true;
		}
		
		
		return view('pages.pet_foundation.adoptpetlist', ['list' => $collection, 'adopt_btn' => $adopt_btn]);
	}
	
	public function addAdoption(Request $request) {
		$input = $request->except(['_token']); 
		
		DB::beginTransaction();
		
		try {
			$model = new PetAdoption();
			$model->pet_name = $input['pet_name'];
			$model->pet_type = $input['pet_type'];
			$model->breed = $input['breed'];
			$model->gender = $input['gender'];
			$model->weight = $input['weight'];
			$model->height = $input['height'];
			$model->background = $input['background'];
			
			$foundation = Auth::user()->foundation; dd($foundation);
			$foundation->adoptions()->save($model);
		} catch (ValidationException $e) {
			DB::rollback();
			return redirect()->back()
				->withInput($request->all())
				->withErrors($e->errors());
		} catch (\Exception $e) {
			DB::rollback();
			return redirect()->back()
				->withInput($request->all())
				->withErrors(['message' => trans('errors.err_500')]);
		}
		
		if(isset($input['ft_img']) AND (!is_null($input['ft_img']))) {
			$filename = md5($input['ft_img']->getClientOriginalName() . Auth::user()->email_address . Carbon::now());
			$dir = StorageHelper::create(Auth::id());
			try {
				$img = new PetFoundationImages();
				$img->user_id = Auth::id();
				$img->foundation_id = $foundation->petfoundation_id;
				$img->adoption_id = $model->pa_id;
				$img->image_path = $dir;
				$img->image_name = $filename;
				$img->image_mime = $input['ft_img']->getClientMimeType();
				$img->image_ext = $input['ft_img']->getClientOriginalExtension();
				$img->is_profile_picture = 1;
				$img->save();
			} catch (ValidationException $e) {
				DB::rollback();
				return redirect()->back()
					->withInput($request->all())
					->withErrors($e->errors());
			} catch (\Exception $e) {
				DB::rollback();
				return redirect()->back()
					->withInput($request->all())
					->withErrors(['message' => trans('errors.err_500')]);
			}
			
			$input['ft_img']->move(storage_path('app') . '/' . $dir, $filename . '.' . $img->image_ext);
		}
		
		
		if(isset($input['other_img'])) {
			foreach($input['other_img'] as $single) {
				if(!is_null($single)) {
					$filename = md5($single->getClientOriginalName() . Auth::user()->email_address . Carbon::now());
					try {
						$img = new PetFoundationImages();
						$img->user_id = Auth::id();
						$img->foundation_id = $foundation->petfoundation_id;
						$img->adoption_id = $model->pa_id;
						$img->image_path = $dir;
						$img->image_name = $filename;
						$img->image_mime = $single->getClientMimeType();
						$img->image_ext = $single->getClientOriginalExtension();
						$img->is_profile_picture = 0;
						$img->save();
					} catch (ValidationException $e) {
						DB::rollback();
						return redirect()->back()
							->withInput($request->all())
							->withErrors($e->errors());
					} catch (\Exception $e) {
						DB::rollback();
						return redirect()->back()
							->withInput($request->all())
							->withErrors(['message' => trans('errors.err_500')]);
					}	
					$single->move(storage_path('app') . '/' . $dir, $filename . '.' . $img->image_ext);
				}
			}
		}		
		
		DB::commit();
		
		return redirect()->back();
	}
	
	public function getImage($user_id, $image_id) {
		$img = PetFoundationImages::find($image_id);
		
		if($img->user_id != $user_id) {
			return false;
		}
		
		$file = Storage::get($img->image_path . '/' . $img->image_name . '.' . $img->image_ext);
		
		return (new Response($file, 200))->header('Content-Type', $img->image_mime);
		
	}

	public function foundProjects(){
		return view('pages.pet_foundation.projects');
	}
	
	public function search(Request $request) {
		$col = PetFoundation::where('country', $request->get('country'))
					->whereNotNull('user_id')
					->orWhere('petfoundation_name', $request->get('name'))
					->orWhere('city', $request->get('city'))
					->orWhere('zip', $request->get('zip'))
					->with([
							'prof_pic' => function($q) {
								$q->addSelect(['image_id', 'foundation_id']);
								$q->where('is_profile_picture', 1);
								$q->where('adoption_id', 0);
							}
					])
					->paginate(20);
		// fix for url trailing slash
		$col->setPath('');
		return view('pages.pet_foundation.list', ['list' => $col]);
	}

}
