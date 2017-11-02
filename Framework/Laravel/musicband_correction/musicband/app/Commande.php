<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cart;
class Commande extends Model
{
    //
    protected $guarded = ['id'];

    public function produits() {
        return $this->belongsToMany('App\Product','commande_products')
            ->withPivot('qte',"prix_unitaire_ttc",'prix_total_ttc');
    }
}
