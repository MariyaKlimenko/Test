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

    <script>
        $(function () {

            /**
             * Ajax function gets modal for creating new Product.
             */
            function showStoreProductModal() {
                $.ajax({
                    url: "product/getStoreModal",
                    type: "get",
                    success: function(data) {
                        $('#modal-place').html(data.html);
                        $('#add-product-modal').modal('show');
                    }
                });
            }

            /**
             * Ajax function gets modal for creating new category.
             */
            function showStoreCategoryModal() {
                $.ajax({
                    url: "category/getStoreModal",
                    type: "get",
                    success: function(data) {
                        console.log('lk');
                        $('#modal-place').html(data.html);
                        $('#add-category-modal').modal('show');
                    }
                });
            }

            /**
             * Ajax function gets modal for updating Product.
             * @param id
             */
            function showUpdateProductModal(id) {
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
            }

            /**
             * Ajax function gets modal for updating Category.
             * @param id
             */
            function showUpdateCategoryModal(id) {
                $.ajax({
                    url: "category/getUpdatePartial",
                    type: "get",
                    data: {
                        id
                    },
                    success: function(data) {
                        $('#modal-place').html(data.html);
                        $('#update-category-modal').modal('show');
                    },
                });
            }

            /**
             * Ajax function gets modal for updating User`s categories.
             * @param id
             */
            function showUpdateUserCategoryModal(id) {
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
            }

            $('#add-product-button').on('click', function () {
                showStoreProductModal();
            });

            $('#add-category-button').on('click', function () {
                showStoreCategoryModal();
            });

            $('.update-product-button').on('click', function () {
                showUpdateProductModal($(this).data('id'));
            });

            $('.update-category-button').on('click', function () {
                showUpdateCategoryModal($(this).data('id'));
            });

            $('.update-user-category-button').on('click', function () {
                showUpdateUserCategoryModal($(this).data('id'));
            });

            $('#myTab li:last-child a').tab('show')
        })
    </script>

@endsection