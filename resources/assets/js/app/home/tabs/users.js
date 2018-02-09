
export default {
    bindEvents () {

        const body = $('body');

        body.on('click', '.update-user-category-button', function () {

            const id = $(this).data('id');

            $.ajax({
                url: "user/getUpdateCategoriesPartial",
                type: "get",
                data: {
                    id
                },
                success: function(data) {
                    $('#modal-place').html(data.html);
                    $('#update-user-category-modal').modal('show');
                },
            });
        });

        body.on('click', '#submit-update-user-category-button', function() {
            $('#update-user-category-form').submit();
        });

    },

    init () {
        this.bindEvents();
    }
}