<?php namespace SNS\Http\Controllers;

use SNS\Http\Requests;
use SNS\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use SNS\Models\Pets;
use SNS\Models\FoundPets;
use SNS\Models\MissingPets;
use SNS\Models\LostFoundPetImages;
use SNS\Libraries\Facades\StorageHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use SNS\Libraries\Cache\Initialize;
use SNS\Libraries\Cache\Get;

class PetsController extends Controller {
	
	public function __construct(Initialize $init, Get $cacheGet) {
		parent::__construct($init, $cacheGet);
	
	}

	public function get_missingpets(){
		$data['info'] = MissingPets::with(['profile.image'])->orderByRaw("RAND()")->first();
		return view('ajax.rightmissing' , $data);
	}
	public function get_foundpets(){
		$data['info'] = FoundPets::with(['image'])->orderByRaw("RAND()")->first();
		return view('ajax.rightfound' , $data);
	}
	public function missingPets(){
		$data['info'] = MissingPets::where('isfind' , '0')->with(['profile.image' , 'profile.user'])->get();	
		return view('pages.missingpet' , $data);
	}
	public function foundPets() {
		$col = FoundPets::with([
				'profile',
				'profile.user',
				'profile.user.registration',
				'profile.profile_pic'])->get();
				
		
		return view('pages.foundpet', ['found_pets' => $col]);
	}
	
	public function getImage($file_id){
		$entry = LostFoundPetImages::find($file_id);
		$file = Storage::get($entry->image_path . '/' . $entry->image_name . '.' . $entry->image_ext);
	
		return (new Response($file, 200))
		->header('Content-Type', $entry->image_mime);
	}
	
	public function getpetselectedinfo(Request $request){
		$input = array_except($request->all(), ['_token']);
		$data['info'] = Pets::where('rocky_tag_no' , $input['id'])->with(['foundpets','image', 'foundpets.image' , 'pet_food' , 'pet_behavior' , 'pet_type'])->get();
		$data['info'] = $data['info'][0];
		return view('ajax.foundmodal' , $data);
	}
	
	public function getpetinfo(Request $request){
		$input = array_except($request->all(), ['_token']);
		$pet = Pets::where('rocky_tag_no' ,  $input['id'])->get();
		$data['pet_info'] = $pet[0];
		$data['pet_info']->load(['pet_behavior', 'pet_food', 'user.registration']);
	
			$data['user_info'] = (Auth::check()) ? Auth::user()->registration : [];
			return view('ajax.foundpet' , $data);
	}
	
	public function addmissingpet(Request $request){
		$input = array_except($request->all(), ['_token']);
		
		DB::beginTransaction();
		try {
			$fp = new FoundPets;
			if(Auth::check()){
				$fp->is_guest = 0;
				$fp->user_id = Auth::id();
			}else{
				$fp->is_guest = 1;
				$fp->user_id = 0;
			}
			$fp->rocky_tag_no = $input['rocky_tag_no'];
			$fp->found_in_remark = $input['found_in_remark'];
			$fp->finder_name = $input['finder_name'];
			$fp->rocky_tag_no = $input['rocky_tag_no'];
			$fp->found_in_address1 = $input['finder_address1'];
			$fp->found_in_address2 = $input['finder_address2'];
			$fp->finder_country_code = $input['finder_country_code'];
			$fp->finder_area_code = $input['finder_area_code'];
			$fp->finder_tel_no = $input['finder_tel_no'];
			$fp->found_in_city = $input['found_in_city'];
			$fp->found_in_state = $input['found_in_state'];
			$fp->found_in_zip = $input['found_in_zip'];
			$fp->found_in_country = $input['country'];
			$fp->save();
		} catch (\Exception $e) {
			DB::rollback();
			return redirect()->back()
					->withInput($request->except(['_token']))
					->withErrors(['message' => trans('errors.err_500')]);
		}
		if($request->hasFile('myfile')) {
			foreach($request->file('myfile') as $single) {
				$upload = $this->upload($fp, $single);
				if($upload == true) {
					continue;
				} else {
					return redirect()->back()
							->withInput($request->except(['_token']))
							->withErrors($upload);
				}
			}
		}
	
		DB::commit();
		
		return redirect()->back()->withErrors(['message' => 'Thank you for reporting a missing pet']);
	}
	
	/**
	 * 
	 * @param mixed $parent
	 * @param Request $file
	 */
	private function upload($parent, $file) {
		if(Auth::check()) {
			$dir = StorageHelper::create(Auth::id());
		} else {
			$dir = StorageHelper::create(0);
		}		
		
		$filename = md5($file->getClientOriginalName() . Carbon::now());
		try {
			$image = new LostFoundPetImages([
					'image_path' => $dir,
					'image_name' => $filename,
					'image_mime' => $file->getMimeType(),
					'image_ext' => $file->getClientOriginalExtension()
					]);
			$parent->image()->save($image);
			$file->move(storage_path('app') . '/' . $dir, $filename . '.' . $image->image_ext);
		} catch (\Exception $e) {
			DB::rollback();
			return trans('errors.err_500');
		}
		
	}

	public function findpets(){
		$data['pets'] = Pets::where('user_id' , Auth::id())->with(['image'])->get();
		return view('ajax.missingpet' , $data);
	}

	public function addlostpet(Request $request){
		$input = array_except($request->all(), ['_token']);

		$missing = new MissingPets;
		if($input['with-tag'] == 'true'){
			$pets = Pets::find($input['select-pet']);
			$missing->owner = Auth::id();
			$missing->rocky_tag_no = $pets->rocky_tag_no;
			$missing->pet_name = $pets->pet_name;
			$missing->pet_type = $pets->pet_type;
			$missing->breed = $pets->breed;
			$missing->gender = $pets->pet_gender;
			$missing->weight = $pets->weight;
			$missing->height = $pets->height;
			$missing->brand = $pets->brand;
			$missing->food = $pets->food;
			$missing->feed_interval = $pets->feeding_interval;
			$missing->feed_time = $pets->feeding_time;
			$missing->pet_behavior = $pets->pet_behavior;
			$missing->pet_when = $input['pet_when'];
		}else{
			$missing->owner = Auth::id();
			$missing->pet_name = $input['pet_name'];
			$missing->pet_type = $input['pet_type'];
			$missing->breed = $input['breed'];
			$missing->gender = $input['pet_gender'];
			$missing->weight = $input['weight'];
			$missing->height = $input['height'];
			$missing->brand = $input['brand'];
			$missing->food = $input['food'];
			$missing->feed_interval = $input['feeding_interval'];
			$missing->feed_time = $input['feeding_time'];
			$missing->pet_behavior = $input['bahavior'];
			$missing->pet_when = $input['pet_when'];	
		}
		$missing->lost_in_address1 = $input['address1'];
		$missing->lost_in_address2 = $input['address2'];
		$missing->lost_in_city = $input['city'];
		$missing->lost_in_state = $input['state'];
		$missing->lost_in_country = $input['country'];
		$missing->lost_in_remarks = $input['remarks'];
		$missing->save();

		echo 'Lost dog has been reported';
	}
}
