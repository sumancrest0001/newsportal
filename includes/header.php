
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?> - News Portal</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo url('css/bootstrap.css') ?>">
	<link rel="stylesheet" href="<?php echo url('css/material-design-iconic-font.css'); ?>">
	<link rel="stylesheet" href="<?php echo url('css/raleway.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo url('css/alertify.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo url('css/default.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo url('css/front.css') ?>">
</head>
<body>
	<div class="container">
		<div class="row">
			<header class="col-12">
				<div class="row">
					<div class="col text-xs-center"><h1>News Portal</h1></div>
					<div class="col-md-2 col-sm-4 mt-3 text-right text-xs-center">
						<span><?php echo date('j M, Y'); ?></span>
					</div>
				</div>
			</header>
		</div>
		<?php require_once "includes/nav.php"; ?>
	</div>