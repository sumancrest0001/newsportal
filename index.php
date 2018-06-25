<?php 
	require_once 'includes/init.php';
	require_once 'includes/db-conn.php';
	$title = 'Welcome';
	$active = 'home';
	require_once 'includes/header.php';
?>
	<div class="container">
		<main class="row">
			<div class="col-12 my-4">
				<?php
					$now = now();
					$sql = "SELECT * FROM articles WHERE status = 'PUBLISHED' AND published_at <= '{$now}' ORDER BY published_at DESC LIMIT 0,1";
					$result = db_query($con, $sql);
					if($result && db_num_rows($result) > 0):
				?>
				<?php $article = db_fetch_assoc($result); ?>
				<div class="row">
					<?php if(isset($article['featured_image']) && !empty($article['featured_image']) && is_file('images/'.$article['featured_image'])): ?>
					<div class="col-lg-4 col-md-5">
						<img src="<?php echo url('images/'.$article['featured_image']); ?>" class="img-fluid border" alt="<?php echo $article['name']; ?>">
					</div>
					<?php endif; ?>
					<div class="col">
						<div class="row">
							<div class="col-12">
								<span class="h2"><?php echo $article['name']; ?></span>
							</div>
							<div class="col-12">
								<?php
									$author = db_fetch_assoc(db_query($con, "SELECT first_name, middle_name, last_name FROM users WHERE id = '{$article['user_id']}'"));
								?>
								<span class="mr-3"><i class="zmdi zmdi-account-circle"></i> <?php echo $author['first_name'].' '.$author['middle_name'].' '.$author['last_name']; ?></span>
								<span><i class="zmdi zmdi-time"></i> <?php echo date('j M Y \a\t h:i A', strtotime($article['published_at'])); ?></span>
							</div>
							<article class="col-12 text-justify">
								<?php
									$content = strip_tags($article['content']);
									$content = substr($content, 0, 300);
								?>
								<p><?php echo $content.'...'; ?></p>
								<a href="<?php echo url('news/'.$article['slug']); ?>">Read More</a>
							</article>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12"><hr></div>
				</div>
				<?php endif; ?>
				<div class="row">
					<?php
						$now = now();
						$sql = "SELECT * FROM articles WHERE status = 'PUBLISHED' AND published_at <= '{$now}' ORDER BY published_at DESC LIMIT 1,4";
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