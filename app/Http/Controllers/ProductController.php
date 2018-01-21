<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ProductController extends Controller
{

    public function add(AddProductRequest $request)
    {
        $product = Product::create(['name' => $request->input('productnamefield')]);
        $categoryIds =  array_values($request->except('_token', 'productnamefield'));
        $product->categories()->sync($categoryIds);

        return response()->json(['responseText' => 'Success!', 'request' => $request], 200);
    }

}
