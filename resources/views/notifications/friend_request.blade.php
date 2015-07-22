@extends('notifications.container', array(
	'route' => $profile_route,
	'active' => $active,
	'message' => trans('profile.friend.request_msg', array('name' => $name))
))