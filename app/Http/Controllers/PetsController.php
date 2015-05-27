<?php namespace SNS\Http\Controllers;

use SNS\Http\Requests;
use SNS\Http\Controllers\Controller;

use Illuminate\Http\Request;
use SNS\Models\Pets;
use SNS\Models\FoundPets;
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
		$data['info'] = Pets::find($input['id']);
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
		$fp->finder_address1 = $input['finder_address1'];
		$fp->finder_tel_no = $input['finder_tel_no'];
		$fp->save();
	
		$file = $request->file('myfile');
	
		if(Auth::check()){
			foreach($file as $single) {
				$dir = StorageHelper::create(Auth::id());
				$filename = md5($single->getClientOriginalName() . Carbon::now());
				$image = new LostFoundPetImages([
						'image_path' => $dir,
						'image_name' => $filename,
						'image_mime' => $single->getMimeType(),
						'image_ext' => $single->getClientOriginalExtension()
						]);
				$fp->image()->save($image);
				$single->move(storage_path('app') . '/' . $dir, $filename . '.' . $image->image_ext);
			}
		}else{
			foreach($file as $single) {
				$dir = StorageHelper::create(0);
				$filename = md5($single->getClientOriginalName() . Carbon::now());
				$image = new LostFoundPetImages([
						'image_path' => $dir,
						'image_name' => $filename,
						'image_mime' => $single->getMimeType(),
						'image_ext' => $single->getClientOriginalExtension()
						]);
				$fp->image()->save($image);
				$single->move(storage_path('app') . '/' . $dir, $filename . '.' . $image->image_ext);
			}
		}
	
		return redirect()->back()->withErrors(['message' => 'Thank you for reporting a missing pet']);
	}
}
