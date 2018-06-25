<?php
	require_once 'includes/init.php';
	require_once 'includes/db-conn.php';

	if(isset($_GET['u']) && !empty($_GET['u'])) {
		$u = $_GET['u'];

		$sql = "DELETE FROM users WHERE username = '{$u}'";

		if(db_query($con, $sql)) {
			header('location:users.php?msg=User deleted.');
		}
		else {
			header('location:users.php?error=Problem while deleting user. Please try again.');
		}
	}
	else {
		header('location:users.php?error=Problem while deleting user. Please try again.');
	}
