<?php namespace SNS\Libraries\Traits;

use SNS\Models\Images;

trait ProfPicTrait {
	
	protected function removePrevious($user_id) {
		Images::where('user_id', $user_id)->where('is_profile_picture', 1)->update(array('is_profile_picture' => 0));
	}
}
