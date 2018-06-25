<?php
	require_once 'includes/init.php';
	$title = 'Login'; 
	require_once 'includes/header.php'; ?>

	<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col content-holder">

				<div class="col-4 content-body my-3 mx-auto">
					<div class="row">
						<div class="col-12 text-center">
							<h1>Login</h1>
						</div>
						<?php include_once 'includes/messages.php'; ?>
						<div class="col-12">
							<form method="post" action="login-exec.php">
								<div class="form-group">
									<label for="username">Email/Username</label>
									<input type="text" name="username" id="username" class="form-control" placeholder="Enter your email or username." required>
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" name="password" id="password" class="form-control" placeholder="Enter your password." required>
								</div>
								<div class="form-group">
									<div class="form-check">
										<input type="checkbox" name="remember" value="yes" class="form-check-input" id="remember">
										<label for="remember">Remember Me</label>
									</div>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-outline-primary">Login</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php require_once 'includes/footer.php'; ?>