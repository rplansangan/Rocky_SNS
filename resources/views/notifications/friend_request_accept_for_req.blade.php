@extends('notifications.container', array(
	'route' => $profile_route,
	'active' => $active,
	'message' => trans('profile.friend.request_accept_for_req_msg', array('name' => $name))
))