<?php
    namespace App;
    use Cart;
    use Illuminate\Database\Eloquent\Model;
    class Commande extends Model{
        protected $guarded = ['id'];
        //Liaison Many to Many
        public function produits(){
            return $this->belongsToMany('App\Product', 'commande_products')->withPivot('quantity', 'prix_unit_ttc', 'prix_total_ttc');
        }
    }
