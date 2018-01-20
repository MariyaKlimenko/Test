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
                    @include('user.partials.addcategory')
                @endrole
                @foreach($categories as $category)
                    <p>{{$category->name}}</p>
                @endforeach
            </div>

            <div class="tab-pane" id="products" role="tabpanel" aria-labelledby="products-tab">
                @role('admin')
                @include('user.partials.addproduct')
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
                     </p>
                 @endforeach

            </div>
            @role('admin')
            <div class="tab-pane active" id="users" role="tabpanel" aria-labelledby="users-tab">
                @foreach($users as $user)
                    <p>
                        {{$user->name}}
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#allowCategoryModal{{ $user->id }}">
                            Categories
                        </button>
                    </p>
                    @include('user.partials.allowcatrgorytouser')
                @endforeach
            </div>
            @endrole
        </div>
    <script>
        $(function () {
            $('#myTab li:last-child a').tab('show')
        })
    </script>

@endsection