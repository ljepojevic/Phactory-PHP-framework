<?php

namespace Core;

class Validate {

	// Generate hash string
	// type = md5, sha1, sha256...
	// Validate::encrypt
	// Validate::decrypt
	// Validate::xss
	// Validate::csrf
	// Validate::token
	// Validate::oAuth
	// Validate::login(username,password)
	// Validate::catcha

	public static function encrypt($type, $data, $salt) {

		$hash = hash_init($type, HASH_HMAC, $salt);

		hash_update($hash, $data);

		return hash_final($hash);

	}

	// sanitizing data

	// xss

	// csrf

	// session token

	// oAuth

}