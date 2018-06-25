<?php 
	require_once 'includes/init.php';
	require_once 'includes/db-conn.php';

	if(isset($_POST) && !empty($_POST)) {
		$full_name = $_POST['full_name'];
		$email = $_POST['email'];
		$comment = $_POST['comment'];
		$article_id = $_POST['article_id'];
		$now = now();

		$sql = "INSERT INTO comments SET full_name = '{$full_name}', email = '{$email}', comment = '{$comment}', article_id = '{$article_id}', status = 'ACTIVE', created_at = '{$now}'";
		$result = db_query($con, $sql);
		if($result) {
			header('location:'.$_SERVER['HTTP_REFERER'].'?msg=Comment added successfully.');
		}
		else {
			header('location:'.$_SERVER['HTTP_REFERER'].'?error=Error while adding comment please try again.');
		}
	}
	else {
		header('location:'.$_SERVER['HTTP_REFERER'].'?error=Error while adding comment please try again.');
	}