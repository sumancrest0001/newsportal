<?php
	require_once 'includes/init.php';
	require_once 'includes/db-conn.php';

	if(isset($_GET['s']) && !empty($_GET['s'])) {
		$s = $_GET['s'];

		$sql = "DELETE FROM categories WHERE slug = '{$s}'";

		if(db_query($con, $sql)) {
			header('location:categories.php?msg=Category deleted.');
		}
		else {
			header('location:categories.php?error=Problem while deleting category. Please try again.');
		}
	}
	else {
		header('location:categories.php?error=Problem while deleting category. Please try again.');
	}
