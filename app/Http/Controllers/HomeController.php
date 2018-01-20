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

        if(Auth()->user()->isAdmin()){
            $users = User::where('id', '!=', Auth()->user()->id)->get();
            $categories = Category::all();
            $products = Product::all();
            $data = [
                'users' => $users,
                'categories' => $categories,
                'products' => $products
            ];
        } else {
            $categories = Auth()->user()->categories;
            $products = collect();
            foreach($categories as $category) {
                foreach($category->products as $product) {
                    $products->push($product);
                }
            }
            $data = [
                'categories' => $categories,
                'products' => $products
            ];
        }

        return view('user.home', $data);
    }

}
