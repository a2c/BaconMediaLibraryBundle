function bacon_upload_bundle() {
    $(document).find('#fileupload').fileupload({
        dataType: 'json',
        progressall: function (e, data) {
            $('#progress').show();

            var progress = parseInt(data.loaded / data.total * 100, 10);

            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        },
        done: function (e, data) {
            $('#progress').hide();

            var result = data.result;
            if (typeof result === 'object') {
                $('#table_list_uploads tbody').append('<tr>' + '<td>' +
                    '<div class="media"> ' +
                    '<div class="media-left media-middle"> ' +
                    '<a href="#"> ' +
                    '<img class="media-object" src="'+result.bacon_media_library.src+'" alt="'+result.bacon_media_library.name+'">' +
                    '<input type="radio" name="select_image" class="value_image_select" value="'+result.bacon_media_library.id+'" data-id="'+result.bacon_media_library.id+'" data-src="'+result.bacon_media_library.src+'" checked> ' +
                    '</a> ' +
                    '</div> ' +
                    '<div class="media-body"> ' +
                    '<h5 class="media-heading">'+result.bacon_media_library.name+'</h5>' +
                    '<button class="btn btn-danger remove_upload_modal"><span class="glyphicon glyphicon-remove-circle"></span> Remove</button> ' +
                    '</div> ' +
                    '</div> ' +
                    '</td>'
                );
            }
        }
    });
}