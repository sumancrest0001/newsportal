<?php

if(!function_exists('db_connect')) {

	/**
	 * Connect to MySQL database.
	 * @return mixed
	 */
	function db_connect() {
		$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			die();
		}
		else {
			return $con;
		}
	}
}

if(!function_exists('db_query')) {

	/**
	 * Run MySQL query.
	 * @param  mixed $con
	 * @param  string $sql
	 * @return mixed
	 */
	function db_query($con, $sql) {
		return mysqli_query($con, $sql);
	}
}

if(!function_exists('db_id')) {

	/**
	 * Returns last inserted ID.
	 * @param  mixed $con
	 * @return int
	 */
	function db_id($con) {
		return mysqli_insert_id($con);
	}
}

if(!function_exists('db_num_rows')) {

	/**
	 * Counts number of data rows in MySQL result.
	 * @param  mixed $result
	 * @return int
	 */
	function db_num_rows($result) {
		return mysqli_num_rows($result);
	}
}

if(!function_exists('db_fetch_assoc')) {

	/**
	 * Returns MySQL data result in associative
	 * array.
	 * @param  mixed $result
	 * @return array
	 */
	function db_fetch_assoc($result) {
		return mysqli_fetch_assoc($result);
	}
}