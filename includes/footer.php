<div class="container">
		<footer class="row footer text-md-left text-sm-center text-xs-center">
			<div class="col-lg-4 my-3">
				<div class="row">
					<div class="col-lg-12 col-md">
						<div class="row">
							<div class="col-12">
								<p class="h1">News Portal</p>
							</div>
							<div class="col-12">
								<address>
									Tinkune, Kathmandu<br>
									<a href="mailto:newsportal@gmail.com">newsportal@gmail.com</a><br>
									<a href="tel:+977-984-1234567">+977-984-1234567</a>
								</address>
							</div>
						</div>
					</div>
					<div class="col-lg-12 col-md">
						<div class="row">
							<div class="col-12">
								<p class="h3">Find Us On</p>
							</div>
							<div class="col-12">
								<a href="http://facebook.com" class="social-link mr-2" target="_blank"><i class="zmdi zmdi-facebook-box"></i></a>
								<a href="http://twitter.com" class="social-link mr-2" target="_blank"><i class="zmdi zmdi-twitter-box"></i></a>
								<a href="http://plus.google.com" class="social-link mr-2" target="_blank"><i class="zmdi zmdi-google-plus-box"></i></a>
								<a href="http://youtube.com" class="social-link" target="_blank"><i class="zmdi zmdi-youtube"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md my-3">
				<div class="col-12">
					<p class="h1">About Us</p>
				</div>
				<div class="col-12 text-justify">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam suscipit, nisl non aliquet convallis, urna metus fringilla nisl, eu lobortis erat lorem vel sapien. Nam euismod lectus at consectetur facilisis. Vestibulum varius nisl nec metus hendrerit volutpat. In lacus est, dapibus at pretium blandit, finibus ac tortor. Maecenas pulvinar mi id ipsum sollicitudin tristique.</p>
				</div>
			</div>
			<div class="col-lg-4 col-md my-3">
				<div class="row">
					<div class="col-12">
						<p class="h1">Contact Us</p>
					</div>
					<div class="col-12">
						<form method="post" id="contact-form" action="<?php echo url('send-contact.php'); ?>">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name" id="name" class="form-control form-control-sm" form="contact-form" required>
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" name="email" id="email" class="form-control form-control-sm" form="contact-form" required>
							</div>
							<div class="form-group">
								<label for="message">Message</label>
								<textarea class="form-control" name="message" id="message" form="contact-form" required></textarea>
							</div>
							<div class="form-group">
								<button type="submit" form="contact-form" class="btn btn-primary">Send</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<script type="text/javascript" src="<?php echo url('js/jquery.js') ?>"></script>
	<script type="text/javascript" src="<?php echo url('js/popper.js') ?>"></script>
	<script type="text/javascript" src="<?php echo url('js/bootstrap.js') ?>"></script>
	<script type="text/javascript" src="<?php echo url('js/alertify.js') ?>"></script>
	<script type="text/javascript" src="<?php echo url('js/front.js') ?>"></script>

	<?php if(isset($_GET['msg']) && !empty($_GET['msg'])): ?>
	<script type="text/javascript">
		alertify.success('<?php echo $_GET['msg']; ?>');
	</script>
	<?php endif;?>
	<?php if(isset($_GET['error']) && !empty($_GET['error'])): ?>
	<script type="text/javascript">
		alertify.error('<?php echo $_GET['error']; ?>');
	</script>
	<?php endif;?>
</body>
</html>