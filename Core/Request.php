<?php

namespace Core;

use App\Config;

class Request {

	// Redirect to URL
	public static function redirect($route, $code = null) {
        header("Location: " . Config::BASE_DIR . "$route");
	}

	// Query functions

	public static function query($param) {
		if (isset($_REQUEST) && isset($_REQUEST[$param]))
			return $_REQUEST[$param];
		else 
			return "x";
	}

	public static function get($param) {
		if (isset($_GET) && isset($_GET[$param]))
			return $_GET[$param];
		else 
			return "b";
	}

	public static function post($param) {
		if (isset($_POST) && isset($_POST[$param]))
			return $_POST[$param];
		else 
			return "c";
	}

	// Extra

	//  PUT

	// DELETE

	// OPTIONS

	// HEAD

	public static function getRequest() {
		return $_SERVER['REQUEST_METHOD'];
	}

	//-----------------

	// Page request

	// Check if AJAX request

	// Check if JSON

	// -------------
	public static function setHeader() {

	}

	public static function getHeader() {

	}

	public static function getIP() {

	}

	public static getHttpResponse() {
		return http_response_code();
	}

	public static setHttpResponse($code) {
		return http_response_code($code);
	}

}