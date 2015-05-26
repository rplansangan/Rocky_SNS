<?php namespace SNS\Http\Controllers;

use SNS\Http\Requests;
use SNS\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SNS\Models\EmailValidation;

class UpgradesController extends Controller {
	
	public function main($action) { 
		switch($action) {
			case 'email_validation':
				return $this->upgradeEmailValidation();
			
			default:
				break;
		}
		
	}
	
	private function upgradeEmailValidation() {
		$collection = EmailValidation::withTrashed()->get();
		
		foreach($collection as $single) {
			$single->type = 'registration';
			$single->save();
		}
	}

}
