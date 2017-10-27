<?php
    namespace App\Services\Calculette;
    use Illuminate\Support\Facades\Facade;
    class CalculetteFacade extends Facade{
        protected static function getFacadeAccessor(){
            return Calculette::class;
        }
    }