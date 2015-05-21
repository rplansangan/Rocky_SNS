<?php namespace SNS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FoundationProjects extends Model {

	use SoftDeletes;
	
	/**
	 * 
	 * @var string
	 */
	protected $primaryKey = 'project_id';
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'foundation_projects';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['petfoundation_id', ' project_name', 'project_description'];
	
	protected $dates = ['deleted_at'];
}
