<?php

namespace Core;

class Session {

	public static function init(){
		session_start();
	}

	public static function get($name){
		if (isset($_SESSION[$name])) {
			return $_SESSION[$name];
		}
		else {
			return false;
		}
	}

	public static function set($name, $value){
		$_SESSION[$name] = $value;
	}

	public static function delete($name){
		unset($_SESSION[$name]);
		session_destroy();
	}
}