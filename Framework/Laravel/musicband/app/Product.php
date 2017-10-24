<?php
    namespace App;
    use Illuminate\Database\Eloquent\Model;
    class Product extends Model{
        public $taxe;
        
        public function displayPrice($prix_ht){
            $prix_ht = $prix_ht * $this->taxe;
        return number_format($prix_ht);
        }
    }
