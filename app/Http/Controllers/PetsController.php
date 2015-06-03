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

class PetsController extends Controller {

	public function foundPets() {
		$col = FoundPets::with([
				'profile' => function($q) {
					$q->addSelect(['pet_id', 'user_id', 'rocky_tag_no']);
				},
				'profile.user' => function($q) {
					$q->addSelect(['user_id']);
				},
				'profile.user.registration' => function($q) {
					$q->addSelect(['registration_id', 'user_id', 'first_name', 'last_name']);
				},
				'profile.profile_pic' => function($q) {
					$q->where('is_profile_picture', 1);
					$q->addSelect(['image_id', 'user_id', 'pet_id']);
				}])->get();
				
		
		return view('pages.foundpet', ['found_pets' => $col]);
	}
	
	public function getImage($file_id){
		$entry = LostFoundPetImages::find($file_id);
		$file = Storage::get($entry->image_path . '/' . $entry->image_name . '.' . $entry->image_ext);
	
		return (new Response($file, 200))
		->header('Content-Type', $entry->image_mime);
	}
	
	public function getpetselectedinfo(Request $request){
		$input = array_except($request->all(), array('_token'));
		$data['info'] = Pets::where('rocky_tag_no' , $input['id'])->with(['foundpets','image', 'foundpets.image' , 'pet_food' , 'pet_behavior' , 'pet_type'])->get();
		$data['info'] = $data['info'][0];
		return view('ajax.foundmodal' , $data);
	}
	
	public function getpetinfo(Request $request){
		$input = array_except($request->all(), array('_token'));
		$pet = Pets::where('rocky_tag_no' ,  $input['id'])->get();
		$data['pet_info'] = $pet[0];
		$data['pet_info']->load(['pet_behavior' => function($q) {
			$q->addSelect(['id', 'animal_type_id', 'behavior']);
				},
				'pet_food' => function($q) {
					$q->addSelect(['id', 'brand_name', 'animal_type_id']);
				},
				'user.registration' => function($q) {
					$q->addSelect(['registration_id', 'first_name', 'last_name', 'user_id']);
				}
			]);
	
			$data['user_info'] = (Auth::check()) ? Auth::user()->registration : array();
			return view('ajax.foundpet' , $data);
	}
	
	public function addmissingpet(Request $request){
		$input = array_except($request->all(), array('_token'));
		
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
	
		if($request->hasFile('myfile')) {
			foreach($request->file('myfile') as $single) {
				$this->upload($fp, $single);
			}
		}
	
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
		$image = new LostFoundPetImages([
				'image_path' => $dir,
				'image_name' => $filename,
				'image_mime' => $file->getMimeType(),
				'image_ext' => $file->getClientOriginalExtension()
				]);
		$parent->image()->save($image);
		$file->move(storage_path('app') . '/' . $dir, $filename . '.' . $image->image_ext);
	}

	public function findpets(){
		$data['pets'] = Pets::where('user_id' , Auth::id())->with(array('image'))->get();
		return view('ajax.missingpet' , $data);
	}

	public function addlostpet(Request $request){
		$input = array_except($request->all(), array('_token'));

		$missing = new MissingPets;
		if($input['with-tag'] == 'true'){
			$pets = Pets::find($input['select-pet'])->get();
			$missing->owner = Auth::id();
			$missing->rocky_tag_no = $pets[0]->rocky_tag_no;
			$missing->pet_name = $pets[0]->pet_name;
			$missing->pet_type = $pets[0]->pet_type;
			$missing->breed = $pets[0]->breed;
			$missing->gender = $pets[0]->pet_gender;
			$missing->weight = $pets[0]->weight;
			$missing->height = $pets[0]->height;
			$missing->brand = $pets[0]->brand;
			$missing->food = $pets[0]->food;
			$missing->feed_interval = $pets[0]->feeding_interval;
			$missing->feed_time = $pets[0]->feeding_time;
			$missing->behavior = $pets[0]->pet_behavior;
			$missing->lost_in = $input['pet_foundat'];
			$missing->pet_when = $input['pet_when'];
			$missing->save();
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
			$missing->behavior = $input['bahavior'];
			$missing->lost_in = $input['pet_foundat'];
			$missing->pet_when = $input['pet_when'];
			$missing->save();
		}

		echo 'Lost dog has been Reported';
	}
}
