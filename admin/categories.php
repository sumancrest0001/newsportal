<?php
	require_once 'includes/init.php';
	require_once 'includes/check-user.php';
	require_once 'includes/db-conn.php';
	$title = 'Categories'; 
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
						<div class="col">
							<h1><i class="zmdi zmdi-label"></i> <?php echo $title; ?></h1>
						</div>
						<div class="col-2 text-right">
							<a href="<?php echo url('admin/category-add.php') ?>" class="btn btn-outline-primary"><i class="zmdi zmdi-plus"></i> Add Category</a>
						</div>
						<div class="col-12">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th>#</th>
										<th>Name</th>
										<th>Slug</th>
										<th>Status</th>
										<th>
											Created At
										</th>
										<th>
											Updated At
										</th>
										<th>
											Action
										</th>
									</tr>
								</thead>
								<tbody>
									<?php
										if(isset($_GET['p']) && !empty($_GET['p']) && is_numeric($_GET['p'])) {
											$page_no = $_GET['p'];
										}
										else {
											$page_no = 1;
										}

										$limit = 15;

										$sql = "SELECT COUNT(*) AS total FROM categories";
										$result = db_query($con, $sql);
										$data = db_fetch_assoc($result);

										$total = $data['total'];

										$pages = ceil($total / $limit);

										if($page_no > $pages) {
											$page_no = $pages;
										}

										$offset = ($limit * $page_no) - $limit;

										$sql = "SELECT * FROM categories ORDER BY created_at DESC LIMIT {$offset},{$limit}";
										$result = db_query($con, $sql);

										$n = $offset + 1;

										if($result && db_num_rows($result) > 0):
									?>
									<?php while($category = db_fetch_assoc($result)): ?>
										<tr>
											<td><?php echo $n; $n++; ?></td>
											<td><?php echo $category['name']; ?></td>
											<td><?php echo $category['slug']; ?></td>
											<td><?php echo fupper($category['status']); ?></td>
											<td><?php echo date('d M Y H:i:s', strtotime($category['created_at'])); ?></td>
											<td><?php echo date('d M Y H:i:s', strtotime($category['updated_at'])); ?></td>
											<td>
												<a href="<?php echo url('admin/category-edit.php?s='.$category['slug']); ?>" data-toggle="tooltip" title="Edit this item" class="mr-2"><i class="zmdi zmdi-edit"></i></a>
												<a href="<?php echo url('admin/category-delete.php?s='.$category['slug']); ?>" data-toggle="tooltip" title="Delete this item" class="delete"><i class="zmdi zmdi-delete"></i></a>
											</td>
										</tr>
									<?php endwhile; ?>
									<?php else: ?>
										<tr>
											<td colspan="11" class="text-center">No data found.</td>
										</tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
						<?php if($pages > 1): ?>
						<div class="col-12">
							<nav>
							  <ul class="pagination">

							  	<?php if($page_no > 1): ?>
							    <li class="page-item">
							      <a class="page-link" href="<?php echo url('admin/categories.php?p='.($page_no - 1)); ?>"><i class="zmdi zmdi-chevron-left"></i></a>
							    </li>
								<?php else: ?>
								<li class="page-item disabled">
							      <a class="page-link" href="#"><i class="zmdi zmdi-chevron-left"></i></a>
							    </li>
								<?php endif; ?>

								<?php for($i = 1; $i <= $pages; $i++): ?>
								<?php if($i == $page_no): ?>
								<li class="page-item active">
							      <a class="page-link" href="#"><?php echo $i; ?></a>
							    </li>
								<?php else: ?>
								<li class="page-item">
							      <a class="page-link" href="<?php echo url('admin/categories.php?p='.$i); ?>"><?php echo $i; ?></a>
							    </li>
								<?php endif; ?>	
								<?php endfor; ?>

							    <?php if($page_no < $pages): ?>
							    <li class="page-item">
							      <a class="page-link" href="<?php echo url('admin/categories.php?p='.($page_no + 1)); ?>"><i class="zmdi zmdi-chevron-right"></i></a>
							    </li>
								<?php else: ?>
								<li class="page-item disabled">
							      <a class="page-link" href="#"><i class="zmdi zmdi-chevron-right"></i></a>
							    </li>
								<?php endif; ?>

							  </ul>
							</nav>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php require_once 'includes/footer.php'; ?>