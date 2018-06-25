<?php 
	require_once 'includes/init.php';
	require_once 'includes/db-conn.php';

	if(isset($_POST) && !empty($_POST)) {
		$description = $_POST['description'];
		$comment_id = $_POST['comment_id'];
		$now = now();

		$sql = "INSERT INTO reports SET description = '{$description}', comment_id = '{$comment_id}', created_at = '{$now}'";
		$result = db_query($con, $sql);
		if($result) {
			header('location:'.$_SERVER['HTTP_REFERER'].'?msg=Comment report added successfully.');
		}
		else {
			header('location:'.$_SERVER['HTTP_REFERER'].'?error=Error while adding comment report please try again.');
		}
	}
	else {
		header('location:'.$_SERVER['HTTP_REFERER'].'?error=Error while adding comment report please try again.');
	}