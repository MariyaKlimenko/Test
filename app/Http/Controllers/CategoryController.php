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
        if (auth()->user->hasRole('admin')) {
            Category::create($request->all());
        }
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
        if (auth()->user()->hasRole('admin')) {
            $category->delete();
        }
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

        return redirect('/');
    }
}
