<?php
	require_once 'includes/init.php';
	require_once 'includes/check-user.php';
	require_once 'includes/db-conn.php';
	$title = 'Add Article'; 
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
							<h1><i class="zmdi zmdi-file-text"></i> <?php echo $title; ?></h1>
						</div>
						<div class="col-10 mx-auto">
							<form action="<?php echo url('admin/article-save.php') ?>" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="name">Name</label>
									<input type="text" name="name" id="name" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="Slug">Slug</label>
									<input type="text" name="slug" id="slug" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="category_id">Category</label>
									<select name="category_id" id="category_id" class="form-control" required>
										<option value="">Select a Category</option>
										<?php 
											$sql = "SELECT id, name FROM categories WHERE status = 'ACTIVE'";
											$result = db_query($con,$sql);

											if($result && db_num_rows($result) > 0):
										?>
										<?php while($category = db_fetch_assoc($result)): ?>
										<option value="<?php echo $category['id'] ?>">
											<?php echo $category['name'] ?>
										</option>
										<?php endwhile; ?>	
										<?php endif; ?>
									</select>
								</div>
								<div class="form-group">
									<label for="content">Content</label>
									<textarea id="content" name="content" class="form-control" required></textarea>
								</div>
								<div class="form-group">
									<label for="featured_image">Featured Image</label>
									<input type="file" class="form-control" id="featured_image" name="image" accept="image/*">
									<div class="image-thumbnail mt-3 w-25">
										
									</div>
								</div>
								<div class="form-group">
									<label for="status">Status</label>
									<select name="status" id="status" class="form-control" required>
										<option value="DRAFT">Draft</option>
										<option value="PENDING">Publish</option>
									</select>
								</div>
								<div class="form-group">
									<label for="published_at">Publish At</label>
									<input type="text" name="published_at" id="published_at" class="form-control" placeholder="Leave blank to publish immediately">
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