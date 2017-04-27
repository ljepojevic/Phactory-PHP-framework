<?php

namespace Core;

use App\Config;

class Request {

	// Redirect to URL
	public static function redirect($route, $code = null) {
        header("Location: " . Config::BASE_DIR . $route, true, $code);
	}

	public static function url($route) {
        return Config::BASE_DIR . $route;
	}
	// Query functions

	public static function query($param) {
		if (isset($_REQUEST) && isset($_REQUEST[$param]))
			return $_REQUEST[$param];
		else 
			return "";
	}

	public static function get($param) {
		if (isset($_GET) && isset($_GET[$param]))
			return $_GET[$param];
		else 
			return false;
	}

	public static function post($param) {
		if (isset($_POST) && isset($_POST[$param]))
			return $_POST[$param];
		else 
			return "";
	}

	// Extra

	//  PUT

	public static function put($url, $recordId, $token) {
		$curl = curl_init($url . "/Contacts/{$recordId}");
		$data = array(
		  'first_name' => 'John',
		  );
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json',"OAuth-Token: $token"));
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));

		// Make the REST call, returning the result
		$response = curl_exec($curl);
		if (!$response) {
		    die("Connection Failure.n");
		}		
	}

	// DELETE

	public static function delete($url, $recordId, $token) {
		$curl = curl_init($url . "/Contacts/{$recordId}");
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json',"OAuth-Token: $token"));

		// Make the REST call, returning the result
		$response = curl_exec($curl);
		if (!$response) {
		    die("Connection Failure.n");
		}
	}

	// OPTIONS

	// HEAD

	public static function getRequest() {
		return $_SERVER['REQUEST_METHOD'];
	}

	//-----------------

	// Page request

	// Check if AJAX request
	public static function isAjax() {
		if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
		    return true;
		}	
		else {
			return false;
		}
	}

	// Check if JSON

	// -------------
	public static function setHeader() {

	}

	public static function getHeader() {

	}

	public static function getIP() {
		return $_SERVER['REMOTE_ADDR'];
	}

	public static function getUserAgent() {
		return $_SERVER ['HTTP_USER_AGENT'];
	}	

	public static function getHttpResponse() {
		return http_response_code();
	}

	public static function setHttpResponse($code) {
		http_response_code($code);
		//header($string,$replace,$http_response_code);
	}

}