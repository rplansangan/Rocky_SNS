<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FeedingInterval extends Model {
	
	use SoftDeletes;

	protected $table = 'feeding_intervals';
	
	protected $fillable = array('interval', 'particulars', 'order');

}
