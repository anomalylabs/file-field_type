$(document).on('ajaxComplete ready', function () {
    // Initialize file pickers
    $('[data-provides="anomaly.field_type.file"]:not([data-initialized])')
        .each(function () {
            var $this = $(this);

            $this.attr('data-initialized', '');

            var field = $this.data('field_name');
            var $wrapper = $this.closest('.form-group');
            var $modal = $('#' + field + '-modal');

            $modal.on('click', '[data-file]', function (e) {
                e.preventDefault();

                $modal.trigger('loading');

                $wrapper
                    .find('.selected')
                    .load(
                        REQUEST_ROOT_PATH +
                            '/streams/file-field_type/selected?uploaded=' +
                            $(this).data('file'),
                        function () {
                            $modal.modal('hide');
                        }
                    );

                $this.val($(this).data('file'));
            });

            $wrapper.on('click', '[data-dismiss="file"]', function (e) {
                e.preventDefault();

                $this.val('');

                $wrapper
                    .find('.selected')
                    .load(REQUEST_ROOT_PATH + '/streams/file-field_type/selected');
            });
        });
});
