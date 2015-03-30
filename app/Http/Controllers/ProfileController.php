<?php namespace SNS\Http\Controllers;

use SNS\Http\Requests;
use SNS\Http\Controllers\Controller;

use Illuminate\Http\Request;
use SNS\Models\Registration;
use SNS\Libraries\Facades\PostService;
use SNS\Models\Pets;

class ProfileController extends Controller {

	public function showProfile($id){
		$profileDetails = Registration::find($id); 
		$collection = PostService::initialNewsFeed($id);
		$data['auth'] = true;
		return view('profile.profile' , $data)->with('profile', $profileDetails)->with('posts', $collection);
	}

	public function petlist($id){
		$list = Pets::where('user_id', $id)->with('profile_pic')->get();
		$profileDetails = Registration::find($id); 
		$data['auth'] = true;
		return view('profile.petlist' , $data)->with('profile', $profileDetails)->with('list', $list);
	}
	
	public function showPetProfile($user_id, $pet_id) {
		// don't know why this returns a collection obj instead of model
		$profileDetails = Pets::take(1)->with('profile_pic')->get();
		
		$data['auth'] = true;
		return view('profile.profilepet', $data)->with('profile', $profileDetails[0]);
	}

	public function settings(){
		return view('profile.settings');
	}
}
