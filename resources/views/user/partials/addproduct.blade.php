<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addProductModal">
    Add +
</button>
<br><br>
<!-- Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Add product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-product-form" action="{{ route('addProduct') }}" method="POST" >
                    <div class="form-group">
                        <label for="addProductName">Enter name</label>
                        <input type="text" class="form-control"   name="productnamefield" id="addProductName" placeholder="Enter name">
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
                <div class="" id="error"></div>
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

        var checks = $('.form-check-input');
        var isAnyChecked = false;
        for(var i = 0; i < checks.length; i++){
            if(checks[i].checked == true) {
                isAnyChecked = true
            }
        }

        if(isAnyChecked){
            const data = $('body #add-product-form').serializeArray();

            $.ajax({
                type: 'POST',
                url: '/add/product',
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
            $('#error').addClass('alert alert-danger').html("No one category is checked.");

        }
    });
</script>