<?php namespace SNS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pets extends Model {

	use SoftDeletes;
	
	protected $primaryKey = 'pet_id';
	
	protected $table = 'pets';
	
	protected $fillable = array('user_id', 'pet_name', 'pet_type', 'breed');
	
	protected $dates = array('deleted_at');

}
