jQuery(document).ready(function($) {

  $('[data-dismiss="modal"]').on('click', function() {
    window.close();
  });

	bacon_upload_bundle(
		function() {
			$('#return_value_save').on('click', function() {
				var srcImage = $('input.value_image_select:checked').data('src');
				$(window.opener.document).find('#cke_118_textInput').val(srcImage);

				window.close();
			});
		},
		function(image) {
			$(window.opener.document).find('#cke_118_textInput').val(image.srcOriginal);

			window.close();
		}
	);

});
