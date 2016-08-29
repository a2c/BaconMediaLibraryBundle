jQuery(document).ready(function() {
    $('#bacon_upload_modal').on('click', function() {
        $.ajax({
            url: Routing.generate('bacon_manager_url'),
            method: 'GET',
            success: function(data) {
                $('body').append(data);
                $(document).find('#myModal').modal('show');
                bacon_upload_bundle();
                $('#myModal').find('#return_value_save').on('click', function () {
                    var idPhoto = $(document).find('input.value_image_select:checked').data('id');
                    var srcPhoto = $(document).find('input.value_image_select:checked').data('src');
                    var srcImage = $(document).find('#bacon_upload_modal').data('return-src');
                    var idHiddenImage = $(document).find('#bacon_upload_modal').data('return-id');
                    $(document).find('#'+srcImage).attr('src', srcPhoto);
                    $(document).find('#'+idHiddenImage).attr('value', idPhoto);
                    $(document).find('#myModal').modal('hide');
                });
            }
        });
    });
});