<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;

class UserController extends Controller
{
    public function allow(User $user, Request $request)
    {
        $categoryIds = array_values($request->except('_token'));

        $user->categories()->sync($categoryIds);

        return redirect('/');
    }
}
