<?php
	require_once 'includes/init.php';
	require_once 'includes/db-conn.php';
	
	if(isset($_GET) && !empty($_GET)) {
		$id = $_GET['id'];

		if($_GET['action'] == 'inactive') {
			$status = 'INACTIVE';
		}
		else {
			$status = 'ACTIVE';
		}

		$sql = "UPDATE comments SET status = '{$status}' WHERE id = '{$id}'";

		// echo $sql; die();

		if(db_query($con, $sql)) {
			if($status == 'INACTIVE') {
				$msg = 'Comment disabled.';
			}
			else {
				$msg = 'Comment enabled.';
			}

			header('location:comments.php?msg='.$msg);
		}
		else {
			header('location:comments.php?error=Error while updating data. Please try again.');
		}
	}
	else {
		header('location:comments.php?error=Error while updating data. Please try again.');
	}