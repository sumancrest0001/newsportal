<?php
	require_once 'includes/init.php';
	require_once 'includes/check-user.php';
	require_once 'includes/db-conn.php';
	$title = 'Edit Article'; 
	require_once 'includes/header.php'; 

	$s = $_GET['s'];
	$sql = "SELECT * FROM articles WHERE slug = '{$s}'";
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
				<?php $article = db_fetch_assoc($result); ?>
				<div class="col-12 content-body my-3 py-3">
					<div class="row">
						<div class="col-12">
							<h1><i class="zmdi zmdi-file-text"></i> <?php echo $title; ?></h1>
						</div>
						<div class="col-10 mx-auto">
							<form action="<?php echo url('admin/article-save.php') ?>" method="post" enctype="multipart/form-data">
								<input type="hidden" name="id" value="<?php echo $article['id']; ?>">
								<div class="form-group">
									<label for="name">Name</label>
									<input type="text" name="name" id="name" class="form-control" value="<?php echo $article['name']; ?>" required>
								</div>
								<div class="form-group">
									<label for="Slug">Slug</label>
									<input type="text" name="slug" id="slug" class="form-control" value="<?php echo $article['slug']; ?>" required>
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
										<option value="<?php echo $category['id'] ?>" <?php echo $category['id'] == $article['category_id'] ? 'selected' : ''; ?>>
											<?php echo $category['name'] ?>
										</option>
										<?php endwhile; ?>	
										<?php endif; ?>
									</select>
								</div>
								<div class="form-group">
									<label for="content">Content</label>
									<textarea id="content" name="content" class="form-control" required><?php echo $article['content']; ?></textarea>
								</div>
								<div class="form-group">
									<label for="featured_image">Featured Image</label>
									<input type="file" class="form-control" id="featured_image" name="image" accept="image/*">
									<div class="image-thumbnail mt-3 w-25">
										<?php if(isset($article['featured_image']) && !empty($article['featured_image'])): ?>
											<img src="<?php echo url('images/'.$article['featured_image']); ?>" class="img-fluid img-thumbnail">
											<input type="hidden" name="featured_image" value="<?php echo $article['featured_image']; ?>">
										<?php endif; ?>	
									</div>
								</div>
								<div class="form-group">
									<label for="status">Status</label>
									<select name="status" id="status" class="form-control" required>
										<?php if(user_type() == 'AUTHOR'): ?>
										<option value="DRAFT" <?php echo $article['status'] == 'DRAFT' ? 'selected' : ''; ?>>Draft</option>
										<option value="PENDING" <?php echo $article['status'] == 'PENDING' ? 'selected' : ''; ?>>Publish</option>
									<?php else: ?>
										<option value="PENDING" <?php echo $article['status'] == 'PENDING' ? 'selected' : ''; ?>>Pending</option>
										<option value="PUBLISHED" <?php echo $article['status'] == 'PUBLISHED' ? 'selected' : ''; ?>>Published</option>
									<?php endif; ?>
									</select>
								</div>
								<div class="form-group">
									<label for="published_at">Publish At</label>
									<input type="text" name="published_at" id="published_at" class="form-control" placeholder="Leave blank to publish immediately" value="<?php echo $article['published_at']; ?>">
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