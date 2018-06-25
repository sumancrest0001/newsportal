<?php
	require_once 'includes/init.php';
	require_once 'includes/db-conn.php';

	if(isset($_GET['s']) && !empty($_GET['s'])) {
		$s = $_GET['s'];

		$sql = "SELECT featured_image FROM articles WHERE slug = '{$s}'";
		$image = db_fetch_assoc(db_query($con, $sql));
		@unlink('../images/'.$image['featured_image']);

		$sql = "DELETE FROM articles WHERE slug = '{$s}'";

		if(db_query($con, $sql)) {
			header('location:articles.php?msg=Article deleted.');
		}
		else {
			header('location:articles.php?error=Problem while deleting article. Please try again.');
		}
	}
	else {
		header('location:articles.php?error=Problem while deleting article. Please try again.');
	}
