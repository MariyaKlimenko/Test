
export default {
    bindEvents () {
        const body = $('body');

        body.on('click', '#add-product-button', function () {
            $.ajax({
                url: "product/getStoreModal",
                type: "get",
                success: function(data) {
                    $('#modal-place').html(data.html);
                    $('#add-product-modal').modal('show');
                }
            });
        });

        body.on('click', 'update-product-button', function () {

            const id = $(this).data('id');

            $.ajax({
                url: "product/getUpdatePartial",
                type: "get",
                data: {
                    id
                },
                success: function(data) {
                    $('#modal-place').html(data.html);
                    $('#update-product-modal').modal('show');
                },
            });
        });

        body.on('click', '#submit-update-product-button', function () {

            const isChecked = $('#update-product-form').find('.form-check-input:checked').length > 0;

            if(isChecked){
                $('#update-product-form').submit();
            }else {
                $('#edit-product-error').addClass('alert alert-danger').html("No one category is checked.");
            }
        });

        body.on('click', '#submit-store-product-button', function () {

            const isChecked = $('#add-product-form').find('.form-check-input:checked').length > 0;

            if(isChecked){

                const data = $('body #add-product-form').serializeArray();

                $.ajax({
                    type: 'POST',
                    url: '/product/store',
                    data: data,
                    dataType: 'json',
                    success: function () {
                        location.reload();
                    },
                    error: function (data) {
                        $('#error').addClass('alert alert-danger').html(data.responseJSON.errors.productnamefield[0]);
                    }
                });
            }else {
                $('#store-product-error').addClass('alert alert-danger').html("No one category is checked.");
            }
        });

    },

    init () {
        this.bindEvents();
    }
}