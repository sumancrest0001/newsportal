<?php
	require_once 'includes/init.php';
	require_once 'includes/check-user.php';
	require_once 'includes/db-conn.php';
	$title = 'Add Category'; 
	require_once 'includes/header.php'; ?>

<body>
	<div class="container-fluid">
		<div class="row">
			<?php require_once 'includes/nav.php'; ?>
			<div class="col content-holder">
				<?php require_once 'includes/top-bar.php'; ?>
				<?php require_once 'includes/messages.php'; ?>

				<div class="col-12 content-body my-3 py-3">
					<div class="row">
						<div class="col-12">
							<h1><i class="zmdi zmdi-label"></i> <?php echo $title; ?></h1>
						</div>
						<div class="col-6 mx-auto">
							<form action="<?php echo url('admin/category-save.php') ?>" method="post">
								<div class="form-group">
									<label for="name">Name</label>
									<input type="text" name="name" id="name" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="Slug">Slug</label>
									<input type="text" name="slug" id="slug" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="status">Status</label>
									<select name="status" id="status" class="form-control" required>
										<option value="INACTIVE">Inactive</option>
										<option value="ACTIVE">Active</option>
									</select>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-outline-success"><i class="zmdi zmdi-floppy"></i> Save</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php require_once 'includes/footer.php'; ?>