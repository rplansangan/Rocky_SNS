<?php namespace SNS\Models;

use SNS\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmailValidation extends BaseModel {

	use SoftDeletes;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'email_validations';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['registration_id', 'hash', 'type'];
	
	// RELATIONSHIPS
	public function registration() {
		return $this->belongsTo('SNS\Models\Registration');
	}

}
