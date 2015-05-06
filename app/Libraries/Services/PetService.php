<?php namespace SNS\Libraries\Services;

use SNS\Models\PetBehavior;
use SNS\Models\FoodBrands;
use SNS\Libraries\Traits\EloquentTrait;

class PetService {
	
	use EloquentTrait;
	
	protected $collection;
	
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
