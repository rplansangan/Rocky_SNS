<?php

function customPrintR($array){
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}
function isLike($like){
	$bool = false;
	foreach($like->fetch('like_user_id') as $likes){
		if($likes == Auth::user()->registration->registration_id){
			$bool = true;
			break;
		}
	}
	return ($bool) ? "Unlike" : "Like";
}