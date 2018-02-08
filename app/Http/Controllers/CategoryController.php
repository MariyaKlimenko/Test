<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    /**
     * Store new category.
     * @param CategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        Category::create($request->all());

        return back();
    }

    /**
     * Delete category.
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(Category $category)
    {
        $category->delete();

        return back();
    }

    /**
     * Update category.
     * @param Category $category
     * @param CategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Category $category, CategoryRequest $request)
    {
        if (auth()->user()->hasRole('admin')) {
            $category->update($request->all());
        }

        return redirect()->route('home');
    }

    /**
     * Returns modal for creating new category.
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getStoreModalPartial()
    {
        return response()->json(['success' => true,
                'html' => view('category.partials.store-modal')->render()]);
    }

    /**
     * Returns modal for updating category.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getUpdateModalPartial(Request $request)
    {
        $category = Category::find($request->input('id'));

        if ($category) {
            return response()->json(['success' => true,
                'html' => view('category.partials.update-modal', [
                    'category' => $category
                ])->render()]);
        }

        return response()->json(['success' => false]);
    }
}
