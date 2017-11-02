<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Exclure les champs suivants de mon formulaire pour créer un produit
    protected $guarded = ['id'];

    const taux_tva = 1.2;

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function prixTTC() {
        $prix_ttc = $this->prix_ht * self::taux_tva;
        return number_format($prix_ttc,2);
    }

    // par Produit

    // Dans la table Commande, il faut ajouter 6 attributs
    // prix_total_promo_ttc
    // prix_total_ttc
    // prix_total_promo_ht
    // prix_total_ht
    // montant_de_la_remise_appliquee
    // nom_remise_appliquee
}
