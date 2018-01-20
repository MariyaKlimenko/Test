<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addCategoryModal">
    Add +
</button>
<br><br>
<!-- Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalLabel">Add category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-category-form" action="{{ route('addCategory') }}" method="POST" >
                    <div class="form-group">
                        <label for="addCategoryName">Enter name</label>
                        <input type="text" class="form-control" required  name="name" id="addCategoryName" placeholder="Enter name">
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="event.preventDefault();
                                        document.getElementById('add-category-form').submit();" class="btn btn-primary">
                    Add</button>
            </div>
        </div>
    </div>
</div>