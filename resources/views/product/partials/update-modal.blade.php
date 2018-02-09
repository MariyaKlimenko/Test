
<div class="modal fade" id="update-product-modal" tabindex="-1" role="dialog" aria-labelledby="update-product-modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="update-product-modal"> Edit product "{{ $product->name }}"</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="update-product-form" action="{{ route('updateProduct', ['product' => $product->id]) }}" method="POST" >

                    <div class="form-group">
                        <label for="product-name">Enter name</label>
                        <input type="text" class="form-control" required name="product-name" id="product-name" value="{{ $product->name }}">
                    </div>
                    @foreach($categories as $category)
                        <div class="form-check offset-md-1">
                            <input class="form-check-input"
                                   @if($product->categories->contains('id', $category->id)) checked @endif
                                   name="{{ $category->name }}" type="checkbox" value="{{$category->id}}" id="defaultCheck{{$category->id}}">
                            <label class="form-check-label" for="defaultCheck{{$category->id}}">
                                {{ $category->name }}
                            </label>
                        </div>
                    @endforeach

                    {{ csrf_field() }}
                </form>
                <div class="" id="edit-product-error"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="submit-update-product-button" class="btn btn-primary">
                    Apply</button>
            </div>
        </div>
    </div>
</div>

