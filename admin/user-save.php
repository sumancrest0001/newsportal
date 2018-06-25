<?php
	require_once 'includes/init.php';
	require_once 'includes/db-conn.php';
	
	if(isset($_POST) && !empty($_POST)) {
		$first_name = $_POST['first_name'];
		$middle_name = $_POST['middle_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$contact = $_POST['contact'];
		$address = $_POST['address'];
		$password = sha1($_POST['password']);
		$type = $_POST['type'];
		$status = $_POST['status'];
		$now = now();

		$flag = 0;

		$sql = "SET first_name = '{$first_name}', "
				."last_name = '{$last_name}', "
				."middle_name = '{$middle_name}', "
				."email = '{$email}', "
				."username = '{$username}', "
				."contact = '{$contact}', "
				."address = '{$address}', "
				."type = '{$type}', "
				."status = '{$status}', ";

		if(isset($_POST['id']) && !empty($_POST['id'])) {
			$id = $_POST['id'];
			$opassword = sha1($_POST['opassword']);

			$sql = "UPDATE users ".$sql;

			if(isset($_POST['password']) && !empty($_POST['password'])) {
				$query = "SELECT * FROM users WHERE id = '{$id}' && password='{$opassword}'";
				$result = db_query($query);
				if(db_num_rows($result) > 0) {
					$sql = $sql."password = '{$password}', ";
				}
				else {
					header('location:user-edit.php?id='.$id."&error=Old password does not match our records.");
				}
			}

			$sql = $sql."updated_at = '{$now}' WHERE id = '{$id}'";

			$flag++;
		}
		else {
			$sql = "INSERT INTO users ".$sql."password = '{$password}', created_at = '{$now}', updated_at = '{$now}'";
		}

		// echo $sql; die();

		if(db_query($con, $sql)) {
			if($flag == 0) {
				$msg = 'User added.';
			}
			else {
				$msg = 'User updated.';
			}

			header('location:users.php?msg='.$msg);
		}
		else {
			if($flag == 0) {
				header('location:user-add.php?error=Error while adding data. Please try again.');
			}
			else {
				header('location:'.$_SERVER['HTTP_REFERER'].'&error=Error while editing data. Please try again.');
			}
		}
	}
	else {
		header('location:user-add.php?error=Error while adding data. Please try again.');
	}