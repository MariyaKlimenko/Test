<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{

    public function add(CategoryRequest $request)
    {
        Category::create($request->all());
        return back();
    }

}
