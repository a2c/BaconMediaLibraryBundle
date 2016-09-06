jQuery(document).ready(function() {

	$('#bacon_upload_modal').on('click', function() {

		$.ajax({
			url: Routing.generate('bacon_manager_url'),
			method: 'GET',
			success: function(data) {
				$('body').append(data);

				var $modal = $('#myModal');

				bacon_upload_bundle();

				$modal.find('#return_value_save').on('click', function () {
					var $input = $('input.value_image_select:checked'),
						$uploadModal = $('#bacon_upload_modal'),
						srcImage = $uploadModal.data('return-src'),
						idHiddenImage = $uploadModal.data('return-id');

					$(['#', srcImage].join('')).attr('src', $input.data('src')).removeClass('hidden');
					$(['#', idHiddenImage].join('')).attr('value', $input.data('id'));

					$modal.modal('hide');
				});
			}
		});

	});

});