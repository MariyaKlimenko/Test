
<div class="modal fade" id="update-category-modal" tabindex="-1" role="dialog" aria-labelledby="update-category-modal-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="update-category-modal-label">Edit category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="update-category-form" action="{{ route('updateCategory', ['category' => $category->id]) }}" method="POST" >
                    <div class="form-group">
                        <label for="add-category-name">Enter name</label>
                        <input type="text" class="form-control" required  name="name" id="add-category-name" value="{{ $category->name }}" placeholder="Enter name">
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="submit-update-category-button" class="btn btn-primary">
                    save</button>
            </div>
        </div>
    </div>
</div>
