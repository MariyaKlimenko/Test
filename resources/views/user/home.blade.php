@extends('app')

@section('content')


    <div class="offset-md-1 col-md-10">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="categories-tab" data-toggle="tab" href="#categories" role="tab" aria-controls="categories" aria-selected="false">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="products-tab" data-toggle="tab" href="#products" role="tab" aria-controls="products" aria-selected="false">Products</a>
            </li>
            @role('admin')
            <li class="nav-item">
                <a class="nav-link active" id="users-tab" data-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="true">Users</a>
            </li>
            @endrole

        </ul>
        <br>
        <div class="tab-content">
            <div class="tab-pane" id="categories" role="tabpanel" aria-labelledby="categories-tab">
                @role('admin')
                <button type="button" id="add-category-button" class="btn btn-primary btn-sm" >
                    Add +
                </button>
                <br><br>
                @endrole
                @foreach($categories as $category)
                    <p>{{$category->name}}
                        @role('admin')
                        <a href="{{ route('deleteCategory', ['user' => $category->id]) }}">
                            delete
                        </a>
                        <button type="button" class="update-category-button btn btn-primary btn-sm" data-id="{{ $category->id }}">
                            edit
                        </button>
                        @endrole
                    </p>
                @endforeach
            </div>

            <div class="tab-pane" id="products" role="tabpanel" aria-labelledby="products-tab">
                @role('admin')
                <button type="button" id="add-product-button" class="btn btn-primary btn-sm" >
                    Add +
                </button>
                <br><br>
                @endrole
                @foreach($products as $product)
                     <p >{{$product->name}}
                         <span class="text-muted">
                         [categories:
                             @foreach($product->categories as $category)
                                 {{ $category->name }},
                             @endforeach
                         ]
                         </span>
                         @role('admin')
                         <a href="{{ route('deleteProduct', ['product' => $product->id]) }}">
                             delete
                         </a>
                         <button type="button" class="update-product-button btn btn-primary btn-sm" data-id="{{ $product->id }}">
                             edit
                         </button>
                         @endrole
                     </p>
                 @endforeach
            </div>
            @role('admin')
            <div class="tab-pane active" id="users" role="tabpanel" aria-labelledby="users-tab">
                @foreach($users as $user)
                    <p>
                        {{$user->name}}
                        <a href="{{ route('deleteUser', ['user' => $user->id]) }}">
                            delete
                        </a>
                        <button type="button" class="update-user-category-button btn btn-primary btn-sm" data-id="{{ $user->id }}">
                            Categories
                        </button>
                    </p>
                @endforeach
            </div>
            @endrole
        </div>

        <div id="modal-place"></div>

        <script src="{{ mix('/js/app/home/main.js') }}"></script>

@endsection