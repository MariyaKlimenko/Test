<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $categoryIds = array_values($request->except('_token'));

        $user->categories()->sync($categoryIds);

        return redirect()->route('home');
    }

    /**
     * Delete user
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(User $user)
    {
        $user->delete();

        return back();
    }

    /**
     * Returns modal for updating user`s categories.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getUpdateModalPartial(Request $request)
    {
        $categories = Category::all();
        $user = User::find($request->input('id'));

        if ($user) {
            return response()->json(['success' => true,
                'html' => view('user.partials.update-user-category', [
                    'categories' => $categories,
                    'user'   => $user
                ])->render()]);
        }

        return response()->json(['success' => false]);
    }
}
