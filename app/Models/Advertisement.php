<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertisement extends Model {

	use SoftDeletes;

	protected $table = 'advertisements';

	protected $primaryKey = 'advertisement_id';

	protected $fillable = array('user_id', 'post_id', 'advertisement_type', 'advertisement_title');

	protected $dates = array('deleted_at');

	public static $initialRules = array(
		'advertisement_type' => 'required',
		'advertisement_title' => 'required',
	);

}
