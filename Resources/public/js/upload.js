function bacon_upload_bundle(before, done) {

  if (typeof before !== 'undefined') {
    before();
  }

	var $progress = $('#progress');

	$('.fancybox').fancybox({
		maxWidth: 768
	});

  $('.remove_upload_modal').on('click', function(e) {
    e.preventDefault();

    if (confirm('Deseja realmente remover essa imagem?')) {
      var $image = $(this).closest('.thumbnail'),
          id = $image.find('.value_image_select').attr('data-id');

      var $this = $(this);
      $this
        .data('default', $this.html())
        .text('Removendo...');

      $.ajax({
        url: '', // id
        success: function(data) {
          if (data.status == 'success') {
            $image.remove();
          } else {
            $this.html($this.data('default'));

            alert(data.message);
          }
        },
        error: function() {
          $this.text('Erro');
        }
      });
    }
  });

	$(document).find('#fileupload').fileupload({
		dataType: 'json',
		progressall: function (e, data) {
			$progress.show();

			$progress.find('.progress-bar').css('width', [
				parseInt(data.loaded / data.total * 100, 10), '%'
			].join(''));
		},
		done: function (e, data) {
			$('#progress').hide();

			if (typeof data.result === 'object') {
				var image = data.result.bacon_media_library;

				$('#list_uploads .row').append([
					'<div class="thumbnail">',
						'<a href="', image.src, '" class="fancybox">',
							'<img class="media-object" src="', image.src, '" alt="', image.name, '" width="120" class="img-responsive">',
						'</a>',
						'<div class="caption">',
							'<h4 class="thumbnail-title text-center">', image.name, '</h4>',
							'<div class="btn-group btn-group-justified">',
								'<div class="btn-group">',
									'<label class="btn btn-default">',
										'<input type="radio" name="select_image" class="value_image_select" value="', image.id, '" data-id="', image.id, '" data-src="', image.src, '">',
										' Selecionar',
									'</label>',
								'</div>',
								'<div class="btn-group">',
									'<button class="btn btn-danger remove_upload_modal">',
										'<span class="glyphicon glyphicon-remove-circle"></span>',
										' Remover',
									'</button>',
								'</div>',
							'</div>',
						'</div>',
					'</div>',
				].join(''));

				$('.fancybox').fancybox({
					maxWidth: 768
				});

				if (typeof done !== 'undefined') {
					done(image);
				}
			}
		}
	});

}
