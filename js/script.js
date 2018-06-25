$(function() {
	$('#navbar-toggler').click(function() {
		$('.side-nav').toggle();
	});

	$('.alert').delay(5000).slideUp(300);

	$('#confirm_password').keyup(function() {
		pass = $('#password').val();
		cpass = $(this).val();

		if(pass != cpass) {
			$(this)[0].setCustomValidity('Password not confirmed.');
		}
		else {
			$(this)[0].setCustomValidity('');
		}
	});

	$('[data-toggle=tooltip]').tooltip({
		placement: "left"
	});

	$('.delete').click(function(e) {
		e.preventDefault();
		url = $(this).attr('href');

		if(confirm('Are you sure you want to delete this item?')) {
			location.href = url;
		}
	});

	$('#featured_image').change(function() {
		readURL(this);
	});

	$('#published_at').datetimepicker({
		format: 'Y-m-d H:i:s'
	});

	CKEDITOR.replace('content');
});


function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function (e) {

            html = '<img src="'+e.target.result+'" class="img-fluid img-thumbnail">';

            $('.image-thumbnail').html(html);
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}