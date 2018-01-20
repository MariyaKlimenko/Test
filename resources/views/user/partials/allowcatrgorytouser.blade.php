
<div class="modal fade" id="allowCategoryModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="allowCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="allowCategoryModalLabel">{{ $user->name }} categories</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="allow-category-form-{{ $user->id }}" action="{{ route('allowCategory') }}" method="POST" >
                    <input type="hidden" name="user" value="{{ $user->id }}">
                    @foreach($categories as $category)
                        <div class="form-check offset-md-1">
                            <input class="form-check-input"
                                   @if($user->categories->contains('id', $category->id)) checked @endif
                                   name="{{ $category->name }}" type="checkbox" value="{{$category->id}}" id="defaultCheck{{$category->id}}">
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
                <button type="button" onclick="event.preventDefault();
                        document.getElementById('allow-category-form-{{ $user->id }}').submit();" class="btn btn-primary">
                    Apply</button>
            </div>
        </div>
    </div>
</div>
