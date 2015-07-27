<?php namespace SNS\Models;

use SNS\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class AdvertiseOrder extends BaseModel {
	
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
	protected $fillable = [
							'advertise_id',
							'message',
							'status'
						];
	
	protected $dates = ['deleted_at'];

	public static $initialRules = [
									'message' => 'required'		
								];

	
}
