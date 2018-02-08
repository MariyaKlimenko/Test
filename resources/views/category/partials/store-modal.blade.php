
<div class="modal fade" id="add-category-modal" tabindex="-1" role="dialog" aria-labelledby="store-category-modal-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="store-category-modal-label">Add category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="store-category-form" action="{{ route('storeCategory') }}" method="POST" >
                    <div class="form-group">
                        <label for="add-category-name">Enter name</label>
                        <input type="text" class="form-control" required  name="name" id="add-category-name" placeholder="Enter name">
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="submit-store-category-button" class="btn btn-primary">
                    Add</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
       $('#submit-store-category-button').on('click', function () {
           $('#store-category-form').submit();
       })
    });
</script>