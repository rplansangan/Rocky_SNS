<?php namespace SNS\Handlers\Events;

use SNS\Events\FriendRequest;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use SNS\Libraries\Facades\Notification;

class SendFriendRequest {

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  FriendRequest  $event
	 * @return void
	 */
	public function handle(FriendRequest $event)
	{
		Notification::sendRequest($event->get('notification'));
	}

}
