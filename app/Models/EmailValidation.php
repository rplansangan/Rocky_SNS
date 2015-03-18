<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;

class EmailValidation extends Model {

	protected $table = 'email_validations';
	
	protected $fillable = array('registration_id', 'hash');
	
	public function registration() {
		return $this->belongsTo('SNS\Models\Registration');
	}

}
