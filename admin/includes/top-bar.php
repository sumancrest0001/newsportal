<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				  <button class="navbar-toggler" type="button" id="navbar-toggler">
				    <i class="zmdi zmdi-menu"></i>
				  </button>

					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<span class="navbar-text">Hello <?php echo user()['first_name']; ?></span>
						</li>
      					<li class="nav-item">
        					<a class="nav-link" href="<?php echo url('admin/logout.php') ?>">Logout</a>
      					</li>
      				</ul>
				</nav>