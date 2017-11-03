<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 27/10/2017
 * Time: 14:45
 */

namespace App\Services\Calculette;
use Illuminate\Support\Facades\Facade;

class CalculetteFacade extends Facade
{
    protected static function getFacadeAccessor() {
        return Calculette::class;
    }

}