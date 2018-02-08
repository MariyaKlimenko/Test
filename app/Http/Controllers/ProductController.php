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
        $product = Product::create(['name' => $request->input('product-name')]);
        $categoryIds =  array_values($request->except('_token', 'product-name'));

        $product->categories()->sync($categoryIds);

        return response()->json(['responseText' => 'Success!'], 200);
    }

    /**
     * Delete product
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(Product $product)
    {
        $product->delete();

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
        $categoryIds = array_values($request->except('_token', 'product-name'));

        $product->categories()->sync($categoryIds);
        $product->update(['name' => $request->input('product-name')]);

        return redirect()->route('home');
    }

    /**
     * Rreturns modal for creating new product.
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getStoreModalPartial()
    {
        $categories = Category::all();

        return response()->json(['success' => true,
            'html' => view('product.partials.store-modal',
                ['categories' => $categories])->render()]);
    }

    /**
     * Returns modal for updating product.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getUpdateModalPartial(Request $request)
    {
        $categories = Category::all();
        $product = Product::find($request->input('id'));

        if ($product) {
            return response()->json(['success' => true,
                'html' => view('product.partials.update-modal', [
                    'categories' => $categories,
                    'product'   => $product
                ])->render()]);
        }

        return response()->json(['success' => false]);
    }
}
