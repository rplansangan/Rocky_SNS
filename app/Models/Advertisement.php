<?php namespace SNS\Models;

use SNS\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertisement extends BaseModel {

	use SoftDeletes;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'advertisements';

	/**
	 *
	 * @var string
	 */
	protected $primaryKey = 'advertisement_id';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['user_id', 'post_id', 'advertisement_type', 'advertisement_title'];

	protected $dates = ['deleted_at'];

	public static $initialRules = [
									'advertisement_type' => 'required',
									'advertisement_title' => 'required',
								];

}
