<?php
    namespace App\Http\Controllers\Front;
    use App\Product;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    class MainController extends Controller{
        public function index(){
            $product = Product::all();
            dd($product);
            return view('front.index');
        }
    }
