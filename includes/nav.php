<div class="row">
			<nav class="navbar navbar-expand-md navbar-dark bg-info w-100">
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarNav">
			    <ul class="navbar-nav">
			      <li class="nav-item <?php echo $active == 'home' ? 'active' : ''; ?>">
			        <a class="nav-link" href="<?php echo url(); ?>"><i class="zmdi zmdi-home"></i></a>
			      </li>
			      <?php
			      	$sql = "SELECT name, slug FROM categories WHERE status = 'ACTIVE'";
			      	$result = db_query($con, $sql);
			      	if($result && db_num_rows($result) > 0):
			      ?>
			      <?php while($category = db_fetch_assoc($result)): ?>
			      <li class="nav-item <?php echo $active == $category['slug'] ? 'active' : ''; ?>">
			        <a class="nav-link" href="<?php echo url('category/'.$category['slug']); ?>"><?php echo $category['name']; ?></a>
			      </li>
			  	  <?php endwhile; ?>
			  	  <?php endif; ?>
			    </ul>
			  </div>
			</nav>
		</div>