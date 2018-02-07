
<div class="modal fade" id="add-product-modal" tabindex="-1" role="dialog" aria-labelledby="add-product-modal-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-product-modal-label">Add product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-product-form" action="{{ route('storeProduct') }}" method="POST" >
                    <div class="form-group">
                        <label for="add-product-name">Enter name</label>
                        <input type="text" class="form-control"   name="product-name" id="add-product-name" placeholder="Enter name">
                    </div>
                    @foreach($categories as $category)
                        <div class="form-check offset-md-1">
                            <input class="form-check-input" name="{{ $category->name }}" type="checkbox" value="{{$category->id}}" id="defaultCheck{{$category->id}}">
                            <label class="form-check-label" for="defaultCheck{{$category->id}}">
                                {{ $category->name }}
                            </label>
                        </div>
                    @endforeach
                    {{ csrf_field() }}
                </form>
                <div class="" id="store-product-error"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="add-but" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>
<script>

    $('#add-but').on('click', function () {

        let isChecked = $('#add-product-form').find('.form-check-input:checked').length > 0;
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
</script>