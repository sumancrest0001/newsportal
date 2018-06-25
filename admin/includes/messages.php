<?php
	if(isset($_GET['error']) && !empty($_GET['error'])) {
?>
<div class="row w-100 mx-auto">
	<div class="col-12 mt-3">
		<div class="alert alert-danger" role="alert">
		  <?php echo $_GET['error']; ?>
		</div>
	</div>
</div>
<?php } ?>

<?php
	if(isset($_GET['msg']) && !empty($_GET['msg'])) {
?>
<div class="row w-100 mx-auto">
	<div class="col-12 mt-3">
		<div class="alert alert-success" role="alert">
		  <?php echo $_GET['msg']; ?>
		</div>
	</div>
</div>
<?php } ?>