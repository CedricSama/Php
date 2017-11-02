<?php

namespace App\Http\Controllers\Front;

use App\Commande;
use App\CommandeProduct;
use App\Mail\OrderNew;
use App\Product;
use Calculette;
use Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    // Afficher le formulaire de prise de commande
    public function index() {

        return view('front.order.index');
    }

    // Créer une commande

    public function createCommande(Request $request) {
        $this->validate(\request(),
            [
                'nom'=>"required",
                'adresse'=>"required",
                'email'=>"required|string|email|max:255",
                'code_postal'=>"required",
                'ville'=>"required",
                'pays'=>"required",
                'telephone'=>"required",
            ]);
        $commande = new Commande();

        $commande->fill($request->all());
        $prix_total_ht = Calculette::getTotalHT();
        $prix_total_promo_ht = Calculette::getTotalHT(true);
        $prix_total_ttc = Calculette::getTotalTTC();
        $prix_total_promo_ttc = Calculette::getTotalTTC(true);
        $remise = Calculette::getMontantRemise();
        $montant_de_la_remise_appliquee = $remise != false ? $remise['value'] : false ;
        $nom_remise_appliquee = $remise != false ? $remise['nom'] : false ;

        $commande->prix_total_ht = $prix_total_ht;
        $commande->prix_total_promo_ht = $prix_total_promo_ht;
        $commande->prix_total_ttc = $prix_total_ttc;
        $commande->prix_total_promo_ttc = $prix_total_promo_ttc;
        $commande->montant_de_la_remise_appliquee = $montant_de_la_remise_appliquee;
        $commande->nom_remise_appliquee = $nom_remise_appliquee;
        $commande->save();

        // Récupérer les produits du panier
        $products = Cart::getContent();
        foreach($products as $product) {
            $p = Product::find($product->id);
            // Création du/des produits dans CommandeProduct
            $commandeProduit = new CommandeProduct();
            $commandeProduit->commande_id = $commande->id;
            $commandeProduit->product_id = $product->id;
            $commandeProduit->qte = $product->quantity;
            $commandeProduit->prix_unitaire_ttc = $p->prixTTC();
            $commandeProduit->prix_total_ttc = $product->quantity * $p->prixTTC();
            $commandeProduit->save();
        }

//        echo "commande créée";
//        die();
        // Envoi du mail de confirmation
        Mail::to($commande->email)->send(new OrderNew($commande));

        return redirect()->to(route('commande_merci'));
    }

    public function merci() {
        // Vider le panier du user
        Cart::clear();
        return view('front.order.merci');
    }
}
