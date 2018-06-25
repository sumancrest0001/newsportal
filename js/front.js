$(function() {
	$('.comment-holder a').click(function() {
		id = $(this).attr('data-id');

		$('#comment_id').val(id);
	});
});