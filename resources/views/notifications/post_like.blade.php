@extends('notifications.container', array(
	'route' => $post_route,
	'active' => $active,
	'message' => trans('posts.post_liked', array('name' => $name))
))