<?php
    namespace App;
    use Illuminate\Database\Eloquent\Model;
    class Product extends Model{
        public $taxe;
        
        public function calculTtc($prix_ht){
            $prix_ht = $prix_ht * $this->taxe;
        return $prix_ht;
        }
    }
