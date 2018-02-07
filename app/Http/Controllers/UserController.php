<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Update user permission to categories.
     * @param User $user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(User $user, Request $request)
    {
        if (auth()->user()->hasRole('admin')) {
            $categoryIds = array_values($request->except('_token'));

            $user->categories()->sync($categoryIds);
        }

        return redirect('/');
    }

    /**
     * Delete user
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(User $user)
    {
        if (auth()->user()->hasRole('admin')) {
            $user->delete();
        }
        return back();
    }
}
