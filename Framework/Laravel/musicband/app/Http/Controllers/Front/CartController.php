<?php
    namespace App\Http\Controllers\Front;
    use App\Coupon;
    use App\Product;
    use Cart;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Darryldecode\Cart\CartCondition;
    class CartController extends Controller{
        public function add(Request $request){
            $product = Product::find($request->product_id);
            Cart::add(['id' => $product->id, 'name' => $product->nom, 'price' => $product->prixTTC(), 'quantity' => $request->qte, 'attributes' => ['photo' => $product->photo]]);
            return redirect()->to(route('panier'));
        }
        public function index(){
            $products = Cart::getContent();
            $products = array_sort($products);
            //dd($produtcs);
            $sous_total = Cart::getSubTotal();
            $remises = Cart::getConditions();
            $total = Cart::getTotal();
            $panier_vide = Cart::isEmpty();
            return view('front.cart.index', compact('products', 'total', 'panier_vide', 'sous_total', 'remises'));
        }
        public function updateQte(Request $request){
            Cart::update($request->product_id, ['quantity' => ['relative' => false, 'value' => $request->qte]]);
            return redirect()->to(route('panier'));
        }
        public function delete(Request $request){
            Cart::remove($request->product_id);
            return redirect()->to(route('panier'));
        }
        public function compare(Request $request){
            $code = Coupon::where('code', $request->coupon);
            $count = $code->count();
            //$value = $code->value('value');
            $coupon = $code->first();
            //dd($coupon->value);
            if($count == 1){
                $promo = new CartCondition(array('name' => $coupon->code,
                                                 'type' => 'coupon',
                                                 'target' => 'subtotal',
                                                 'value' => "- $coupon->value",));
                Cart::clearCartConditions();
                Cart::condition($promo);
                return redirect()->to(route('panier'))->with('message_success',
                    "Le coupon {$coupon->code} a été appliqué. Remise: {$coupon->value}");
                /*if($value > 0){
                    return redirect()->to(route('panier', compact('coupon')));
                }else{
                    return redirect()->to(route('panier', compact('coupon')));
                }*/
            }else{
                return redirect()->to(route('panier'))->with('message_error',
                    "Ce coupon n'est pas valide");
            }
        }
    }
