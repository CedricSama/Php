<?php
    namespace App\Http\Controllers\Front;
    use App\Commande;
    use App\CommandeProduct;
    use App\Mail\OrderNew;
    use App\Product;
    use Calculette;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Cart;
    use Illuminate\Support\Facades\Mail;
    class OrderController extends Controller{
        public function index(){
            return view('front.order.index');
        }
        public function createCommande(Request $request){
            $total_ht = Calculette::getTotalHT();
            $total_promo_ht = Calculette::getTotalHT(true);
            $total_ttc = Calculette::getTotalTTC();
            $total_promo_ttc = Calculette::getTotalTTC(true);
            $remise = Calculette::getRemiseValue();
            $remise_value = $remise != false? $remise['value']:false;
            $remise_name = $remise != false? $remise['nom']:false;
            //Verifie les donné du formulaire
            $validations = ['nom' => "required",
                            'adresse' => "required",
                            'email' => 'required|string|email|max:255',
                            'code_postal' => 'required',
                            'ville' => 'required',
                            'pays' => 'required',
                            'telephone' => 'required'
            ];
            $this->validate(\request(), $validations);
            //création de la commande
            $commande = new Commande();
            $commande->prix_total_ht = $total_ht;
            $commande->prix_total_promo_ht = $total_promo_ht;
            $commande->prix_total_ttc = $total_ttc;
            $commande->prix_total_promo_ttc = $total_promo_ttc;
            $commande->remise_name = $remise_name;
            $commande->remise_value = $remise_value;
            $commande->fill($request->all());
            $commande->save();
            //récupérer les produits du paniers
            $products = Cart::getContent();
            foreach($products as $product){
                $p = Product::find($product->id);
                //Création des produits dans CommandeProduct
                $commande_products = new CommandeProduct();
                $commande_products->product_id = $product->id;
                $commande_products->commande_id = $commande->id;
                $commande_products->quantity = $product->quantity;
                $commande_products->prix_unit_ttc = $p->prixTTC();
                $commande_products->prix_total_ttc = $p->prixTTC() * $product->quantity;
                $commande_products->save();
            }
            Mail::to($commande->email)->send(new OrderNew($commande));
            return redirect()->route('merci');
        }
        public function merci(){
            //vider le panier
            Cart::clear();
            return view('front.order.merci');
        }
    }