<?php namespace SNS\Libraries\Services;

use SNS\Models\PetBehavior;
use SNS\Models\FoodBrands;

class PetService {
	
	protected $select;
	
	protected $orderBy;
	
	protected $where;
	
	public function __construct() {
		
	}
	
	public static function __callstatic($method, $args) {
		print_r($args);
	}
	
	
	public function select($columns = array()) {
		if(!$column) {
			$this->select = $columns;
		}
		
		return $this;
	}
	
	public function where($column, $value, $operator) {
		$this->where['column'] = $column;
		$this->where['value'] = $value;
	
		(!$operator) ? $this->where['operator'] = '=' : $this->where['operator'] = $operator;
	
	
		return $this;
	}
	
	public function orderBy($column, $direction) {
		if(!$column) {
			$this->orderBy['column'] = 'created_at';
		} else {
			$this->orderBy['column'] = $column;
		}
		
		if(!$direction) {
			$this->orderBy['direction'] = 'desc';
		} else {
			$this->orderBy['direction'] = $direction;
		}
		
		return $this;
	}
	
	public function listPetBehavior() {
		return PetBehavior::select($this->select)
				->where($this->where['column'], $this->where['operator'], $this->where['value'])
				->orderBy($this->orderBy['column'], $this->orderBy['direction'])
				->get();
	}
	
	public function listFoodBrand() {
		return FoodBrands::select($this->select)
				->where($this->where['column'], $this->where['operator'], $this->where['value'])
				->orderBy($this->orderBy['column'], $this->orderBy['direction'])
				->get();
	}
}
