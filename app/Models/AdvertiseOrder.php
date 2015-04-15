<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class AdvertiseOrder extends Model {
	use SoftDeletes;
	
	/**
	 *
	 * @var string
	 */
	protected $primaryKey = 'id';

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'advertise_orders';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array(
		'advertise_id',
		'message',
		'status'
		);
	
	protected $dates = array('deleted_at');

	public static $initialRules = array(
			'message' => 'required'		
	);

	
}
