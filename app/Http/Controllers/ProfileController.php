<?php namespace SNS\Http\Controllers;

use SNS\Http\Requests;
use SNS\Http\Controllers\Controller;

use Illuminate\Http\Request;
use SNS\Models\Registration;

class ProfileController extends Controller {

	public function showProfile($id){
		$profileDetails = Registration::find($id); 

		return view('profile.profile')->with('profile', $profileDetails);
	}
}
