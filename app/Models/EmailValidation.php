<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmailValidation extends Model {

	use SoftDeletes;
	
	protected $table = 'email_validations';
	
	protected $fillable = array('registration_id', 'hash');
	
	public function registration() {
		return $this->belongsTo('SNS\Models\Registration');
	}

}
