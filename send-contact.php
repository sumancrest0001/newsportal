<?php 
	require_once 'includes/init.php';
	require_once 'includes/db-conn.php';

	if(isset($_POST) && !empty($_POST)) {
		$name = $_POST['name'];
		$message = $_POST['message'];
		$email = $_POST['email'];

		$to = 'uprety.nitish@gmail.com';
		$subject = 'Newsportal Contact';

		$body ="Hello admin,\n\r\n\r";
		$body .= "We have received a contact message.\n\r\n\r";
		$body .= "Name: {$name}\n\r";
		$body .= "Email: {$email}\n\r";
		$body .= "Message: {$message}\n\r\n\r";
		$body .= "Thanks.";

		if(@mail($to, $subject, nl2br($body))) {
			header('location:'.$_SERVER['HTTP_REFERER'].'?msg=Contact message sent successfully.');
		}
		else {
			header('location:'.$_SERVER['HTTP_REFERER'].'?error=Error while sending contact message please try again.');
		}
	}
	else {
		header('location:'.$_SERVER['HTTP_REFERER'].'?error=Error while sending contact message please try again.');
	}