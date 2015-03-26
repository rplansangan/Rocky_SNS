<?php namespace SNS\Http\Controllers;

use SNS\Http\Requests;
use SNS\Http\Controllers\Controller;

use Illuminate\Http\Request;
use SNS\Models\Registration;
use SNS\Libraries\Facades\PostService;

class ProfileController extends Controller {

	public function showProfile($id){
		$profileDetails = Registration::find($id); 
		$collection = PostService::initialNewsFeed();
		$data['auth'] = true;
		return view('profile.profile' , $data)->with('profile', $profileDetails)->with('posts', $collection);
	}
}
