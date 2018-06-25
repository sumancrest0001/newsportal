<?php

if(!function_exists('url')) {

	/**
	 * Gererate site url.
	 * 
	 * @param  string $uri
	 * @return string
	 */
	function url($uri = '') {
		return SITE_URL.$uri;
	}
}

if(!function_exists('check_user')) {

	/**
	 * Check is user is logged in.
	 * @return bool
	 */
	function check_user() {
		if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
			return true;
		}
		else {
			return false;
		}
	}
}

if(!function_exists('user')) {

	/**
	 * Returns information of logged in user.
	 * @return array
	 */
	function user() {
		return $_SESSION['user'];
	}
}

if(!function_exists('user_id')) {

	function user_id() {
		return $_SESSION['user']['id'];
	}
}

if(!function_exists('ip')) {

	/**
	 * Returns client's IP address.
	 * 
	 * @return string
	 */
	function ip() {
		return $_SERVER['REMOTE_ADDR'];
	}
}

if(!function_exists('now')) {

	/**
	 * Returns current date/time
	 * 
	 * @return string
	 */
	function now() {
		return date('Y-m-d H:i:s');
	}
}

if(!function_exists('fupper')) {

	/**
	 * First letter only capital.
	 * @param  string $string
	 * @return string
	 */
	function fupper($string) {
		return ucfirst(strtolower($string));
	}
}

if(!function_exists('user_type')) {

	/**
	 * Returns user's type.
	 * @return string
	 */
	function user_type() {
		return $_SESSION['user']['type'];
	}
}
