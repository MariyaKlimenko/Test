<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->isAdmin()) {
            $users = User::where('id', '!=', Auth()->user()->id)->get();
            $categories = Category::all();
            $products = Product::all();

            return view('user.home', [
                'users'         => $users,
                'categories'    => $categories,
                'products'      => $products
            ]);
        }
        $categories = Auth()->user()->categories;
        $productIds = \DB::table('category_product')
                ->select('product_id')
                ->whereIn('category_id', $categories->pluck('id')->toArray())
                ->distinct()
                ->get();

        $products = Product::findMany($productIds->pluck('product_id')->toArray());

        return view('user.home', [
                'categories'    => $categories,
                'products'      => $products
        ]);
    }
}
