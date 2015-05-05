<?php namespace SNS\Libraries\Traits;

trait EloquentTrait {
	
	protected $attributes;
	
	protected $select;
	
	protected $where;
	
	protected $orderBy;
	
	public function create($attributes) {
		$this->attributes = $attributes;
		
		return $this;
	}
	
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
	
	public function merge() {
		
	}
	
}
