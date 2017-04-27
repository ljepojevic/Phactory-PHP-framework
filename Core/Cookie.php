<?php

namespace Core;

class Cookie {

	public static function get($name){
		if (isset($_COOKIE[$name])) {
			return $_COOKIE[$name];
		}
		else {
			return false;
		}
	}

	public static function set($name, $value, $expire, $path = '', $domain = '', $secure = false, $httponly = false){
		setcookie($name, $value, time() + $expire);
	}

	public static function delete($name) {
		setcookie($name, '', time()-360000);
		unset($_COOKIE[$name]); 
	}
}