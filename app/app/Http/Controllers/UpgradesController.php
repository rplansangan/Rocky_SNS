<?php namespace SNS\Http\Controllers;

use SNS\Http\Requests;
use SNS\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SNS\Models\EmailValidation;
use SNS\Models\Images;
use SNS\Models\PetFoundationImages;

class UpgradesController extends Controller {
	
	public function main($action) { 
		switch($action) {
			case 'email_validation':
				return $this->upgradeEmailValidation();
			case 'foundation_images':
				return $this->upgradeFoundationImages();
				
			default:
				break;
		}
		
	}
	
	private function upgradeFoundationImages() {
		$collection = Images::whereNotNull('pfa_id')->where('pfa_id', '!=', 0)->withTrashed()->get();
		
		foreach($collection as $single) {
			$image = new PetFoundationImages();
			$image->user_id = $single->user_id;
			$image->foundation_id = $single->pfa_id;
			$image->image_path = $single->image_path;
			$image->image_name = $single->image_name;
			$image->image_title = $single->image_title;
			$image->image_mime = $single->image_mime;
			$image->image_ext = $single->image_ext;
			$image->image_desc = $single->image_desc;
			$image->is_profile_picture = $single->is_profile_picture;
			$image->save();
			$single->delete();
		}
		
		echo true;
	}
	
	private function upgradeEmailValidation() {
		$collection = EmailValidation::withTrashed()->get();
		
		foreach($collection as $single) {
			$single->type = 'registration';
			$single->save();
		}
	}

}
