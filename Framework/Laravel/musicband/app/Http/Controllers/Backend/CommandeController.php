<?php
    namespace App\Http\Controllers\Backend;
    use App\Commande;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    class CommandeController extends Controller{
        //lister les commandes
        public function index(){
            $commandes = Commande::all();
            return view('backend.commande.index', compact('commandes'));
        }
        //voir une commande
        public function show($commande_id){
            $commande = Commande::find($commande_id);
            return view('backend.commande.show', compact('commande'));
        }
        
        //generer un pdf(via page html)
        
        //pour tester directement dans le terminal
        //(je crois qu'il faut installer le module tinker avant tahi)
        //php artisan tinker $commande = Commande::find($commande_id);
    }
