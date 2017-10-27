<?php
    namespace App;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Http\Request;
    class Product extends Model{
        
        protected $guarded = ['id'];
        const taux_tva =1.2;
    
        public function __construct(array $attributes = []){
            parent ::__construct($attributes);
        }
        //Liason 1 to Many
        public function category(){
            return $this->belongsTo(Category::class);
        }
        
        public function prixTTC(){
            $prixTTC = $this->prix_ht * self::taux_tva;
            return number_format($prixTTC, 2);
        }
        
        //Par Produit
        // Dans la table Commande, il faut ajouter 6 attributs
        //prix_total_ttc
        //prix_total_promo_ttc
        //prix_total_ht
        //prix_total_promo_ht
        //montant de la remise appliqué
        //nom_de_la_remise_appliqué
        
        public function coupon(){
            return $this->belongsTo(Coupon::class);
        }
    }
