<?php
namespace App\Services\Calculette;
use Cart;

class Calculette
{

    const taux_tva = 1.2;
    const coefficient_conversion_ttc_vers_ht = 100 / (100+20);

    public function getTotalHT($prix_promo = false) {
        if($prix_promo) {
            $total_ttc = Cart::getTotal();
        } else {
            $total_ttc = Cart::getSubTotal();
        }
        $total_ht = $total_ttc * self::coefficient_conversion_ttc_vers_ht;
        return $total_ht;
    }
    public function getTotalTTC($prix_promo = false) {
        if($prix_promo) {
            $total_ttc = Cart::getTotal();
        } else {
            $total_ttc = Cart::getSubTotal();
        }
        return $total_ttc;
    }

    public function getMontantRemise() {
        $cartConditions = Cart::getConditions();
        $remise = false;
        if(count($cartConditions)>0) {
            foreach($cartConditions as $condition) {
                $remise['value'] = $condition->getValue();
                $remise['nom'] = $condition->getName();
            }
        }
        return $remise;
    }





}