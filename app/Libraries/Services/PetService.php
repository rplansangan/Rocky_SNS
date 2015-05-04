<?php namespace SNS\Libraries\Services;

use SNS\Models\PetBehavior;
use SNS\Models\FoodBrands;

class PetService {
	
	protected $selects;
	
	protected $orderBy;
	
	protected $where;
	
	protected $collection;
	
	public function select($columns) {
		$this->selects = $columns;
		
		return $this;
	}
	
	public function where($column, $value, $operator = null) {
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
	
	public function get() {
		return $this->collection;
	}
	
	public function listPetBehavior() {
		$this->collection = PetBehavior::select($this->selects)
				->where($this->where['column'], $this->where['operator'], $this->where['value'])
				->orderBy($this->orderBy['column'], $this->orderBy['direction'])
				->get();
		
		return $this;
	}
	
	public function listFoodBrand() {
		$this->collection = FoodBrands::select($this->selects)
				->where($this->where['column'], $this->where['operator'], $this->where['value'])
				->orderBy($this->orderBy['column'], $this->orderBy['direction'])
				->get();
		
		return $this;
	}
}
