<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 27/10/2017
 * Time: 14:47
 */

namespace App\Services\Calculette;
use Illuminate\Support\ServiceProvider;

class CalculetteServiceProvider extends ServiceProvider
{
    public function register() {
        $this->app->singleton('Calculette',function($app){
           return new Calculette();
        });
    }


}