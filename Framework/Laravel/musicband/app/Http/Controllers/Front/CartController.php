<?php
    namespace App\Http\Controllers\Front;
    use App\Product;
    use Cart;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    class CartController extends Controller{
        public function add(Request $request){
            $product = Product::find($request->product_id);
            Cart::add(['id' => $product->id, 'name' => $product->nom, 'price' => $product->prixTTC(), 'quantity' => $request->qte, 'attributes' =>[]]);
            return redirect()->to(route('panier'));
        }
        
        public function index(){
            $cartCollection =Cart::getContent();
            dd($cartCollection);
            return view('front.cart.index');
        }
    }
