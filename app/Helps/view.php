<?php

if(!function_exists('test_helps')){
	function test_helps(){
		return "ok";
	}
}

if(!function_exists('route_class')){
	function route_class(){
    	return str_replace('.', '-', Route::currentRouteName());
	}
}