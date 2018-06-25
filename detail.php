<?php 
	require_once 'includes/init.php';
	require_once 'includes/db-conn.php';

	$s = $_GET['s'];
	$now = now();

	$sql = "SELECT * FROM articles WHERE slug = '{$s}' AND status = 'PUBLISHED' AND published_at <= '{$now}'";
	$result = db_query($con, $sql);
	$article = db_fetch_assoc($result);

	$title = $article['name'];
	$active = '';
	require_once 'includes/header.php';
?>
	<div class="container">
		<main class="row">
			<div class="col-12 my-4">
				<div class="row">
					<div class="col-12">
						<p class="h1"><?php echo $article['name'] ?></p>
					</div>
					<?php if(isset($article['featured_image']) && !empty($article['featured_image']) && is_file('images/'.$article['featured_image'])): ?>
					<div class="col-12 mb-3">
						<img src="<?php echo url('images/'.$article['featured_image']); ?>" class="img-fluid border" alt="<?php echo $article['name']; ?>">
					</div>
					<?php endif; ?>
					<div class="col-12 mb-3">
						<?php
							$author = db_fetch_assoc(db_query($con, "SELECT first_name, middle_name, last_name FROM users WHERE id = '{$article['user_id']}'"));
						?>
						<span class="mr-3"><i class="zmdi zmdi-account-circle"></i> <?php echo $author['first_name'].' '.$author['middle_name'].' '.$author['last_name']; ?></span>
						<span><i class="zmdi zmdi-time"></i> <?php echo date('j M Y \a\t h:i A', strtotime($article['published_at'])); ?></span>
					</div>
					<div class="col-12">
						<?php echo $article['content']; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-5 col-md">
						<div class="row">
							<div class="col-12">
								<h3>Add Comment</h3>
							</div>
							<div class="col-12">
								<form method="post" action="<?php echo url('comment-add.php'); ?>">
									<input type="hidden" name="article_id" value="<?php echo $article['id']; ?>">
									<div class="form-group">
										<label for="full_name">Your Name</label>
										<input type="text" name="full_name" id="full_name" class="form-control" required>
									</div>
									<div class="form-group">
										<label for="email">Your Email</label>
										<input type="email" name="email" id="email" class="form-control" required>
									</div>
									<div class="form-group">
										<label for="comment">Your Comment</label>
										<textarea name="comment" id="comment" class="form-control" required></textarea>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-primary">Send</button>
									</div>
								</form>
							</div>
							<?php
								$sql = "SELECT * FROM comments WHERE article_id = '{$article['id']}' AND status = 'ACTIVE' ORDER BY created_at DESC";

								$result = db_query($con, $sql);
								if($result && db_num_rows($result) > 0):
							?>
							<div class="col-12">
								<hr>
							</div>
							<div class="col-12">
								<div class="row">
									<div class="col-12">
										<h3>Comments</h3>
									</div>
								</div>
								<?php while($comment = db_fetch_assoc($result)): ?>
								<div class="col-12 comment-holder">
									<div class="row">
										<div class="col-12">
											<strong><?php echo $comment['full_name']; ?></strong>
											<br>
											<small>
												<em><?php echo $comment['email']; ?></em>
											</small>
										</div>
										<div class="col-12 comment">
											<?php echo $comment['comment']; ?>
										</div>
										<div class="col-12">
											<small>
												<i class="zmdi zmdi-time"></i> <?php echo date('j M Y \a\t H:i', strtotime($article['created_at'])); ?>
												<a href="#" data-toggle="modal" data-target="#reportModal" data-id="<?php echo $comment['id']; ?>">Report this comment</a>
											</small>
										</div>
									</div>
								</div>
								<?php endwhile; ?>
							</div>	
							<?php endif; ?>
						</div>
					</div>
					<div class="col-lg-5 col-md ml-auto">
						<div class="row">
							<?php
								$sql="SELECT * FROM articles WHERE status = 'PUBLISHED' AND published_at <= '{$now}' AND category_id = '{$article['category_id']}' AND id != '{$article['id']}' ORDER BY RAND() LIMIT 0,2";
								$result = db_query($con, $sql);
								if($result && db_num_rows($result) > 0):
							?>
							<div class="col-12">
								<h3>Similar Articles</h3>
							</div>
							<?php while($similar = db_fetch_assoc($result)): ?>
							<div class="col-md-12 col-6 mb-3">
								<div class="row">
									<?php if(isset($similar['featured_image']) && !empty($similar['featured_image']) && is_file('images/'.$similar['featured_image'])): ?>
									<div class="col-lg-4 col-md-5">
										<div style="background-image: url('<?php echo url('images/'.$similar['featured_image']); ?>')" class="article-thumbnail small border"></div>
									</div>
									<?php endif; ?>
									<div class="col-lg-8 col-md-7">
										<a href="<?php echo url('news/'.$similar['slug']); ?>">
											<strong><?php echo $similar['name']; ?></strong>
										</a>
									</div>
								</div>
							</div>
							<?php endwhile; ?>
							<div class="col-12">
								<hr>
							</div>
							<?php endif; ?>
							<?php
								$sql="SELECT * FROM articles WHERE status = 'PUBLISHED' AND published_at <= '{$now}' AND id != '{$article['id']}' ORDER BY RAND() LIMIT 0,2";
								$result = db_query($con, $sql);
								if($result && db_num_rows($result) > 0):
							?>
							<div class="col-12">
								<h3>Recommended Articles</h3>
							</div>
							<?php while($recommended = db_fetch_assoc($result)): ?>
							<div class="col-md-12 col-6 mb-3">
								<div class="row">
									<?php if(isset($recommended['featured_image']) && !empty($recommended['featured_image']) && is_file('images/'.$recommended['featured_image'])): ?>
									<div class="col-lg-4 col-md-5">
										<div style="background-image: url('<?php echo url('images/'.$recommended['featured_image']); ?>')" class="article-thumbnail small border"></div>
									</div>
									<?php endif; ?>
									<div class="col-lg-8 col-md-7">
										<a href="<?php echo url('news/'.$recommended['slug']); ?>">
											<strong><?php echo $recommended['name']; ?></strong>
										</a>
									</div>
								</div>
							</div>
							<?php endwhile; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>

	<div class="modal fade" id="reportModal">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Report a comment</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      <form action="<?php echo url('comment-report.php'); ?>" id="report-form" method="post">
	        <div class="form-group">
	        	<textarea name="description" id="description" class="form-control" placeholder="Enter your report." form="report-form" required></textarea>
	        	<input type="hidden" name="comment_id" id="comment_id" form="report-form">
	        </div>
	  	  <form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" form="report-form" class="btn btn-primary">Submit</button>
	      </div>
	    </div>
	  </div>
	</div>

	<?php require_once 'includes/footer.php'; ?>