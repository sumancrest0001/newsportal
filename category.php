<?php 
	require_once 'includes/init.php';
	require_once 'includes/db-conn.php';

	$s = $_GET['s'];

	$sql = "SELECT * FROM categories WHERE slug = '{$s}' AND status = 'ACTIVE'";
	$result = db_query($con, $sql);
	$cat = db_fetch_assoc($result);

	$title = $cat['name'];
	$active = $cat['slug'];
	require_once 'includes/header.php';
?>
	<div class="container">
		<main class="row">
			<div class="col-12 my-4">
				<div class="row">
					<?php
						$now = now();
						$sql = "SELECT * FROM articles WHERE status = 'PUBLISHED' AND published_at <= '{$now}' AND category_id = '{$cat['id']}' ORDER BY published_at DESC";

						$result = db_query($con, $sql);
						if($result && db_num_rows($result) > 0):
					?>
					<?php while($article = db_fetch_assoc($result)): ?>
					<div class="col-lg-3 col-md-6">
						<div class="row">
							<div class="col-12">
								<strong><?php echo $article['name']; ?></strong>
							</div>
							<?php if(isset($article['featured_image']) && !empty($article['featured_image']) && is_file('images/'.$article['featured_image'])): ?>
							<div class="col-12">
								<div style="background-image: url('<?php echo url('images/'.$article['featured_image']); ?>')" class="article-thumbnail border"></div>
							</div>
							<?php endif; ?>
							<div class="col-12 text-justify">
								<?php
									$content = strip_tags($article['content']);
									$content = substr($content, 0, 300);
								?>
								<p><?php echo $content.'...'; ?></p>
							</div>
							<div class="col-12 text-center">
								<a href="<?php echo url('news/'.$article['slug']); ?>" class="btn btn-primary btn-sm">Read More</a>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</main>
	</div>

	<?php require_once 'includes/footer.php'; ?>