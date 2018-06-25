<?php
	require_once 'includes/init.php';
	require_once 'includes/db-conn.php';
	
	if(isset($_POST) && !empty($_POST)) {
		/*echo "<pre>";
		print_r($_POST);
		print_r($_FILES);*/

		$name = $_POST['name'];
		$slug = $_POST['slug'];
		$category_id = $_POST['category_id'];
		$content = $_POST['content'];
		$status = $_POST['status'];
		$now = now();

		$flag = 0;

		if(isset($_POST['published_at']) && !empty($_POST['published_at'])) {
			$published_at = date('Y-m-d H:i:s', strtotime($_POST['published_at']));
		}
		else if($status == 'PUBLISHED') {
			$published_at = $now;
		}
		else {
			$published_at = null;
		}

		if(isset($_POST['featured_image']) && !empty($_POST['featured_image'])) {
			$filename = $_POST['featured_image'];
		}
		else {
			$filename = null;
		}

		$image = $_FILES['image'];

		if($image['error'] == 0) {
			if($image['type'] == 'image/jpg' || $image['type'] == 'image/jpeg' || $image['type'] == 'image/gif' || $image['type'] == 'image/png') {
				if($image['size'] <= (5*1024*1024)) {
					move_uploaded_file($image['tmp_name'], '../images/'.$image['name']);
					if(!is_null($filename)) {
						@unlink('../images/'.$filename);
					}
					$filename = $image['name'];
				}
			}
		}

		$sql = "SET name = '{$name}', "
				."category_id = '{$category_id}', "
				."content = '{$content}', "
				."status = '{$status}', "
				."featured_image = '{$filename}'";

		if(!is_null($published_at)) {
			$sql = $sql.", published_at = '{$published_at}'";
		}		

		if(isset($_POST['id']) && !empty($_POST['id'])) {
			$id = $_POST['id'];
			$sql = "UPDATE articles ".$sql.", updated_at = '{$now}' WHERE id = '{$id}'";
			$flag = 1;
		}
		else {
			$user_id = user_id();
			$sql = "INSERT INTO articles ".$sql.", user_id = '{$user_id}', slug = '{$slug}', created_at = '{$now}', updated_at = '{$now}'";
		}

		/*echo htmlentities($sql);
		die();*/

		if(db_query($con, $sql)) {
			if($flag == 0) {
				$msg = 'Article added.';
			}
			else {
				$msg = 'Article updated.';
			}

			header('location:articles.php?msg='.$msg);
		}
		else {
			if($flag == 0) {
				header('location:article-add.php?error=Error while adding data. Please try again.');
			}
			else {
				header('location:'.$_SERVER['HTTP_REFERER'].'&error=Error while editing data. Please try again.');
			}
		}
	}
	else {
		header('location:article-add.php?error=Error while adding data. Please try again.');
	}