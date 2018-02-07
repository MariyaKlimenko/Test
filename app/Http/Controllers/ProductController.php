<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ProductController extends Controller
{
    /**
     * Store new product and synchronize its categories.
     * @param StoreProductRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProductRequest $request)
    {
        if (auth()->user()->hasRole('admin')) {
            $product = Product::create(['name' => $request->input('product-name')]);
            $categoryIds =  array_values($request->except('_token', 'product-name'));
            $product->categories()->sync($categoryIds);
            return response()->json(['responseText' => 'Success!'], 200);
        }
        return response()->json(['responseText' => 'error!'], 404);
    }

    /**
     * Delete product
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(Product $product)
    {
        if (auth()->user()->hasRole('admin')) {
            $product->delete();
        }
        return back();
    }

    /**
     * Update product and its categories.
     * @param Product $product
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Product $product, Request $request)
    {
        if (auth()->user()->hasRole('admin')) {
            $categoryIds = array_values($request->except('_token', 'product-name'));

            $product->categories()->sync($categoryIds);
            $product->update(['name' => $request->input('product-name')]);
        }

        return redirect('/');
    }

    public function getStoreModalPartial()
    {
        if (auth()->user()->hasRole('admin')) {
            $categories = Category::all();
            return response()->json(['success' => true,
                'html' => view('product.partials.store-modal',
                    ['categories' => $categories])->render()]);
        }
        return response()->json(['success' => false]);
    }

    public function getUpdateModalPartial(Request $request)
    {
        if (auth()->user()->hasRole('admin')) {
            $categories = Category::all();
            $product = Product::find($request->input('id'));
            if ($product) {
                return response()->json(['success' => true,
                    'html' => view('product.partials.update-modal', [
                        'categories' => $categories,
                        'product'   => $product
                    ])->render()]);
            }
        }
        return response()->json(['success' => false]);
    }
}
