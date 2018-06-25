<?php
	require_once 'includes/init.php';
	require_once 'includes/check-user.php';
	$title = 'Dashboard'; 
	require_once 'includes/header.php'; ?>

<body>
	<div class="container-fluid">
		<div class="row">
			<?php require_once 'includes/nav.php'; ?>
			<div class="col content-holder">
				<?php require_once 'includes/top-bar.php'; ?>

				<div class="col-12 content-body my-3">
					<div class="row">
						<div class="col-12">
							<h1>Dashboard</h1>
						</div>
						<?php echo now() ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php require_once 'includes/footer.php'; ?>