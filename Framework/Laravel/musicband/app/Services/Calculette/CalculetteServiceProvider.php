<?php
    namespace App\Services\Calculette;
    use Illuminate\Support\ServiceProvider;
    class CalculetteServiceProvider extends  ServiceProvider{
        public function register(){
            $this->app->singleton('Calculette', function($app){
                return new Calculette();
            });
        }
    }