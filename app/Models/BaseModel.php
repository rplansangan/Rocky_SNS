<?php namespace SNS\Models;

use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model {
	
	/**
	 * Checks if given relation is not null
	 * @param string $relation
	 * @return boolean
	 */
	public function isNotNull($relation) {
		return isset($this->relations[$relation]);
	}
}
