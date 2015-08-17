<?php namespace SNS\Libraries\ViewModels;

use SNS\Libraries\Traits\Expirations;
use SNS\Libraries\Traits\Keys;

/**
 * This object will act as an adapter for cached public attributes of Eloquent Models via Redis.
 * Some algorithms/methods have been based/taken from Laravel's Illuminate\Database\Eloquent\Model
 * @author Rap
 *
 */
abstract class BaseViewModel {
	
	use Expirations, Keys;
	
	/**
	 * Cache key to be used for the ViewModel
	 * 
	 * @var string
	 */
	protected $cacheKey;
	
	/**
	 * The primary key for the model.
	 *
	 * @var string
	 */
	protected $primaryKey = 'id';
	
	/**
	 * The model's attributes.
	 *
	 * @var array
	 */
	protected $fillable = [];
	
	/**
	 * The model's attributes.
	 *
	 * @var array
	 */
	protected $attributes = [];
	
	/**
	 * The model's declared relationships
	 * 
	 * @var array
	 */
	protected $declare = [];
	
	/**
	 * The loaded relationships for the model.
	 *
	 * @var array
	 */
	protected $relations = [];
	
	/**
	 * Create a new Eloquent model instance.
	 *
	 * @param  array  $attributes
	 * @return void
	 */
	public function __construct(array $attributes = []) {
		$this->fillable[] = $this->primaryKey;
		
		$this->fill($attributes);
		
		// try if given attributes contains relationships
		$this->fillRelations($attributes);
	}
	
	/**
	 * Checks if given relation is not null
	 * @param string $relation
	 * @return boolean
	 */
	public function isNotNull($relation) {
		return isset($this->relations[$relation]);
	}
	
	/**
	 * Fill the model with an array of attributes.
	 * 
	 * @param array $attributes
	 * @return $this
	 */
	public function fill(array $attributes) {
		foreach($attributes as $key => $value) {
			$this->setAttribute($key, $value);
		}
		
		$this->fillRelations($attributes);
	}
	
	public function fillRelations(array $attributes) {
		foreach($attributes as $key => $value) {
			if(!is_null($value)) {
				$this->setRelation($key, $value);
			}
		}
	}
	
	/**
	 * Get an attribute from the model.
	 *
	 * @param  string  $key
	 * @return mixed
	 */
	public function getAttribute($key) {	
		// If the key references an attribute, we can just go ahead and return the
		// plain attribute value from the model. This allows every attribute to
		// be dynamically accessed through the _get method without accessors.
		if (array_key_exists($key, $this->attributes))
		{
			return $this->attributes[$key];
		}
	
		// If the key already exists in the relationships array, it just means the
		// relationship has already been loaded, so we'll just return it out of
		// here because there is no need to query within the relations twice.
		if (array_key_exists($key, $this->relations))
		{
			return $this->relations[$key];
		}
	}
	
	/**
	 * Set a given attribute on the model.
	 *
	 * @param  string  $key
	 * @param  mixed   $value
	 * @return void
	 */
	public function setAttribute($key, $value) {
		if(in_array($key, $this->fillable)) {			
			$this->attributes[$key] = $value;
		}
	}
	
	/**
	 * Set a given relationship on the model.
	 *
	 * @param  string  $key
	 * @param  mixed   $value
	 * @return void
	 */
	public function setRelation($key, $value) {
		if(in_array($key, $this->declare)) {
			$this->relations[$key] = $this->{$key}($value);
		}
	}
	
	/**
	 * Dynamically retrieve attributes on the model.
	 *
	 * @param  string  $key
	 * @return mixed
	 */
	public function __get($key) {
		return $this->getAttribute($key);
	}
	
	/**
	 * Dynamically set attributes on the model.
	 *
	 * @param  string  $key
	 * @param  mixed   $value
	 * @return void
	 */
	public function __set($key, $value) {
		$this->setAttribute($key, $value);
	}
	
}
