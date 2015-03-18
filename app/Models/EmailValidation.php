<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;

class EmailValidation extends Model {

	protected $table = 'email_validation';
	
	protected $fillable = array('user_id', 'hash');
	
	public function registration() {
		return $this->belongsTo('SNS\Models\Registration');
	}

}
