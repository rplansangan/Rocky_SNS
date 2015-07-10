<?php namespace SNS\Libraries\Services;

use SNS\Models\PetBehavior;
use SNS\Models\FoodBrands;
use SNS\Libraries\Traits\EloquentTrait;

class PetService {
	
	use EloquentTrait;
	
	protected $collection;
	
	protected $equivs;
	
	protected $formName;
	
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
	
	public function setId($attrib) {
		$this->setAttribEquiv($attrib, 'id');
		
		return $this;
	}
	
	public function setLabel($attrib) {
		$this->setAttribEquiv($attrib, 'label');
		
		return $this;
	}
	
	protected function setAttribEquiv($attrib, $key) {
		$this->equivs[$key] = $attrib;
		return $this;
	}
	
	protected function getEquiv($key) {
		return $this->equivs[$key];
	}
	
	public function setFormName($name) {
		$this->formName = $name;
		return $this;
	}
	
	public function formatAsSelect() {
		$items = array();
		foreach($this->collection as $key) {
			$items[] = array('id' => $key->{$this->getEquiv('id')}, 'label' => $key->{$this->getEquiv('label')});
		}
		
		$params['items'] = $items;
		$params['formName'] = $this->formName;
		return view('partials.generic_select', $params);
	}
}
