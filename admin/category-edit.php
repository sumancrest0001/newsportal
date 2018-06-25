<?php
	require_once 'includes/init.php';
	require_once 'includes/check-user.php';
	require_once 'includes/db-conn.php';
	$title = 'Edit Category'; 
	require_once 'includes/header.php'; 

	$s = $_GET['s'];

	$sql = "SELECT * FROM categories WHERE slug = '{$s}'";
	$result = db_query($con, $sql);
?>

<body>
	<div class="container-fluid">
		<div class="row">
			<?php require_once 'includes/nav.php'; ?>
			<div class="col content-holder">
				<?php require_once 'includes/top-bar.php'; ?>
				<?php require_once 'includes/messages.php'; ?>

				<?php if(db_num_rows($result) > 0): ?>
				<?php $category = db_fetch_assoc($result); ?>
				<div class="col-12 content-body my-3 py-3">
					<div class="row">
						<div class="col-12">
							<h1><i class="zmdi zmdi-label"></i> <?php echo $title; ?></h1>
						</div>
						<div class="col-6 mx-auto">
							<form action="<?php echo url('admin/category-save.php') ?>" method="post">
								<input type="hidden" name="id" value="<?php echo $category['id']; ?>">
								<div class="form-group">
									<label for="name">Name</label>
									<input type="text" name="name" id="name" class="form-control" value="<?php echo $category['name'] ?>" required>
								</div>
								<div class="form-group">
									<label for="Slug">Slug</label>
									<input type="text" name="slug" id="slug" class="form-control" value="<?php echo $category['slug'] ?>" required>
								</div>
								<div class="form-group">
									<label for="status">Status</label>
									<select name="status" id="status" class="form-control" required>
										<option value="INACTIVE" <?php echo $category['status']=='INACTIVE' ? 'selected' : ''; ?>>Inactive</option>
										<option value="ACTIVE" <?php echo $category['status']=='ACTIVE' ? 'selected' : ''; ?>>Active</option>
									</select>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-outline-success"><i class="zmdi zmdi-floppy"></i> Save</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<?php require_once 'includes/footer.php'; ?>