<?php
	require_once 'includes/init.php';
	require_once 'includes/db-conn.php';
	
	if(isset($_POST) && !empty($_POST)) {
		$name = $_POST['name'];
		$slug = $_POST['slug'];
		$status = $_POST['status'];
		$now = now();

		$flag = 0;

		$sql = "SET name = '{$name}', "
				."slug = '{$slug}', "
				."status = '{$status}', ";

		if(isset($_POST['id']) && !empty($_POST['id'])) {
			$id = $_POST['id'];

			$sql = "UPDATE categories ".$sql;

			$sql = $sql."updated_at = '{$now}' WHERE id = '{$id}'";

			$flag++;
		}
		else {
			$sql = "INSERT INTO categories ".$sql."created_at = '{$now}', updated_at = '{$now}'";
		}

		// echo $sql; die();

		if(db_query($con, $sql)) {
			if($flag == 0) {
				$msg = 'Category added.';
			}
			else {
				$msg = 'Category updated.';
			}

			header('location:categories.php?msg='.$msg);
		}
		else {
			if($flag == 0) {
				header('location:category-add.php?error=Error while adding data. Please try again.');
			}
			else {
				header('location:'.$_SERVER['HTTP_REFERER'].'&error=Error while editing data. Please try again.');
			}
		}
	}
	else {
		header('location:category-add.php?error=Error while adding data. Please try again.');
	}