<?php

namespace App\Http\Controllers\Front;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{

    public function index() {
        $products = Product::all();
        $categories = Category::all();
        //dd($products);
        return view('front.index',compact('products',"categories"));
    }

    public function show(Request $request) {
        $product = Product::find($request->id);
        return view('front.show',compact('product'));
    }

    public function productsByCategory($id_category) {
        $products = Product::where('category_id',$id_category)->get();
        //dd($products);
        return view('front.index',compact('products'));
    }
}
