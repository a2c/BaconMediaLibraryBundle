jQuery(document).ready(function($) {

	$('.bacon_upload_modal').on('click', function() {
		var $this = $(this);

		$.ajax({
			url: Routing.generate('bacon_manager_url'),
			method: 'GET',
			success: function(data) {
				$('body').append(data);

				var $modal = $('#myModal');
				$modal.modal('show').on('hidden.bs.modal', function () {
                    $modal.remove();
                })

				bacon_upload_bundle(
					undefined,
					function(image) {
						var $uploadModal = $this,
							$thumb = $this.closest('.media-widget').find('.img-thumbnail'),
							$hiddenImage = $(['#', $uploadModal.data('return-id')].join(''));

						$thumb.attr('src', image.src).removeClass('hidden');
						$hiddenImage.attr('value', image.id);

						$('#myModal').modal('hide');
					}
				);

				$modal.find('#return_value_save').on('click', function () {
					var $input = $('input.value_image_select:checked'),
						$uploadModal = $this,
						$thumb = $this.closest('.media-widget').find('.img-thumbnail'),
						$hiddenImage = $(['#', $uploadModal.data('return-id')].join(''));

					$thumb.attr('src', $input.data('src')).removeClass('hidden');
					$hiddenImage.attr('value', $input.data('id'));

					$modal.modal('hide');
				});
			}
		});

	});

});