@extends('notifications.container', array(
	'route' => $profile_route,
	'active' => $active,
	'message' => trans('profile.friend.request_accept_msg', array('profile_route' => $profile_route, 'name' => $name))
))