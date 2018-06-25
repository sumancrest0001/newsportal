<?php
	// var_dump($_COOKIE['np_user']);
	if(!check_user()) {
		header('location: login.php');
	}