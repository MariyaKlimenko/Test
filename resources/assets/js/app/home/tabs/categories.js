
export default {
    bindEvents () {
        const body = $('body');

        body.on('click', '#add-category-button', function() {
            $.ajax({
                url: "category/getStoreModal",
                type: "get",
                success: function(data) {
                    $('#modal-place').html(data.html);
                    $('#add-category-modal').modal('show');
                }
            });
        });

        body.on('click', '.update-category-button', function () {

            const id = $(this).data('id');

            $.ajax({
                url: "category/getUpdatePartial",
                type: "get",
                data: {
                    id
                },
                success: function(data) {
                    $('#modal-place').html(data.html);
                    $('#update-category-modal').modal('show');
                },
            });
        });

        body.on('click', '#submit-update-category-button', function() {
            $('#update-category-form').submit();
        });

        body.on('click', '#submit-store-category-button', function() {
            $('#store-category-form').submit();
        });

    },

    init () {
        this.bindEvents();
    }
}