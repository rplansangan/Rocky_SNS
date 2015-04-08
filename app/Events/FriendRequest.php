<?php namespace SNS\Events;

use SNS\Events\Event;

use Illuminate\Queue\SerializesModels;

class FriendRequest extends Event {

	use SerializesModels;

	/**
	 * 
	 * @var array
	 */
	protected $params;
	
	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct($params)
	{
		$this->params = $params;
	}
	
	public function get($key) {
		return $this->params[$key];
	}

}
