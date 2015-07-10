<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmailValidation extends Model {

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
