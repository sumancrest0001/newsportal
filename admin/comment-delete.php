<?php
	require_once 'includes/init.php';
	require_once 'includes/db-conn.php';

	if(isset($_GET['id']) && !empty($_GET['id'])) {
		$id = $_GET['id'];

		$sql = "DELETE FROM comments WHERE id = '{$id}'";

		if(db_query($con, $sql)) {
			header('location:comments.php?msg=Comment deleted.');
		}
		else {
			header('location:comments.php?error=Problem while deleting comment. Please try again.');
		}
	}
	else {
		header('location:comments.php?error=Problem while deleting comment. Please try again.');
	}
