<?php

namespace App\Http\Controllers\Backend;

use App\Commande;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{
    // Lister les commandes
    public function index() {
        $commandes = Commande::all();
        $now = Carbon::now();

        $year = $now->year;
        $month = $now->month;
        $total_ca_mois = DB::table('commandes')->whereYear('created_at',$year)->whereMonth('created_at',$month)->sum('prix_total_ttc');
        $total_commandes_du_mois = DB::table('commandes')->whereYear('created_at',$year)->whereMonth('created_at',$month)->count();

        return view('backend.commande.index',compact('commandes','total_ca_mois','total_commandes_du_mois'));
    }

    // Voir une commande
    public function show($commande_id) {
        $commande = Commande::find($commande_id);
        return view('backend.commande.show',compact('commande'));
    }
}
