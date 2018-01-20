<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function add()
    {
        if(isset($_POST['name'])){
            $category = Category::create(['name' => $_POST['name']]);
        }
        return redirect('/');
    }

    public function allow()
    {
        $categories = Category::all();
        $user = User::find($_POST['user']);

        foreach ($categories as $category) {
            if (count($user->categories) > 0 && $user->categories->contains('id', $category->id)){
                if (!isset($_POST[$category->name])) {
                    $user->categories()->detach($category);
                }
            } else {
                if (isset($_POST[$category->name])) {
                    $user->categories()->attach($category);
                }
            }
        }
        return redirect('/');
    }

}
