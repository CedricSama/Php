<?php
    namespace App\Http\Controllers\Front;
    use App\Product;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    class MainController extends Controller{
        public function index(){
            $products = Product::all();
            //dd($product);
            return view('front.index', compact('products'));
        }
        public function show(Request $request){
            $product = Product::find($request->id);
            return view('front.show', compact('product'));
        }
    }
