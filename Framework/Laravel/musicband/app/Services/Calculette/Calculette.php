<?php
    namespace App\Services\Calculette;
    use Cart;
    class Calculette{
        const taux_tva = 1.2;
        const coef_ttc_vers_ht = 1 / 1.2;
        public function getTotalHT($prix_promo = false){
            if($prix_promo){
                $total_ttc = Cart::getTotal();
            }else{
                $total_ttc = Cart::getSubTotal();
            }
            $total_ht = $total_ttc * self::coef_ttc_vers_ht;
            return round($total_ht,2);
        }
        public function getTotalTTC($prix_promo = false){
            if($prix_promo){
                $total_ttc = Cart::getTotal();
            }else{
                $total_ttc = Cart::getSubTotal();
            }
            return  round($total_ttc,2);
        }
        public function getRemiseValue(){
            $conditions = Cart::getConditions();
            $remise = false;
            foreach($conditions as $condition){
                $remise['value'] = $condition->getValue();
                $remise['nom'] = $condition->getName();
            }
            return $remise;
        }
    }