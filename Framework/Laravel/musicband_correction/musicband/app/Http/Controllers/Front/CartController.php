<?php

namespace App\Http\Controllers\Front;

use App\Coupon;
use App\Product;
use Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    // ajouter au panier
    public function add(Request $request) {
        $product = Product::find($request->product_id);
        Cart::add(array(
            'id' => $product->id,
            'name' => $product->nom,
            'price' => $product->prixTTC(),
            'quantity' => $request->qte,
            'attributes' => ['photo'=>$product->photo]
        ));
        return redirect()->to(route('panier'));
    }

    // Afficher le panier
    public function index() {
        $products = Cart::getContent();
        $products = array_sort($products);
        $total = Cart::getTotal();
        $sous_total = Cart::getSubTotal();
        $remises = Cart::getConditions();
        $panier_vide = Cart::isEmpty();
        return view ('front.cart.index',compact('products','total','panier_vide','sous_total','remises'));
    }

    // Mettre à jour la qte
    public function updateQte(Request $request) {
        Cart::update($request->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->qte
            ),
        ));
        return redirect()->to(route('panier'));
    }

    public function delete(Request $request) {
        Cart::remove($request->id);
        return redirect()->to(route('panier'));
    }

    public function checkCoupon(Request $request) {
       $coupon_count = Coupon::where('code','=',$request->code)->count();
       // pdo > fetchAll()
       //$coupons = Coupon::where('code','=',$request->code)->get();
        // pdo -> fetch() > return le model coupon concerné
       $coupon = Coupon::where('code','=',$request->code)->first();
       // pdo -> fetch() > return que l'attribut "code" du coupon
//       $coupon = Coupon::where('code','=',$request->code)->value('code');

       if($coupon_count == 1) {
           // Appliquer la promo
           $coupon_condition = new \Darryldecode\Cart\CartCondition(array(
               'name' => $coupon->code,
               'type' => 'coupon',
               'target' => 'subtotal',
               'value' => "- $coupon->value"
           ));
           // Vide les éventuelles conditions déjà appliquées dans le panier
           Cart::clearCartConditions();
           // Ajout de la nouvelle condition
           Cart::condition($coupon_condition);
           return redirect()->to(route('panier'))->with('message',"Le coupon {$coupon->code} a été appliqué. Remise: {$coupon->value}");
       } else {
           return redirect()->to(route('panier'))->with('message',"Coupon invalide");
       }
    }
}
