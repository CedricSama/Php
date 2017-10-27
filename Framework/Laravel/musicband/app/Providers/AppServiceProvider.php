<?php
    namespace App\Providers;
    use App\Category;
    use Cart;
    use Illuminate\Support\Facades\View;
    use Illuminate\Support\ServiceProvider;
    class AppServiceProvider extends ServiceProvider{
        /**
         * Bootstrap any application services.
         *
         * @return void
         */
        public function boot(){
            View::composer('*', function($view){
                $view->with('categories', Category::all())
                     ->with('panier_products', Cart::getContent())
                     ->with('total', Cart::getTotal())
                     ->with('sous_total', Cart::getSubTotal())
                     ->with('panier_vide', Cart::isEmpty())
                     ->with('panier_remises', Cart::getConditions())
                     ->with('total_articles_panier', Cart::getTotalQuantity());
            });
        }
        /**
         * Register any application services.
         *
         * @return void
         */
        public function register(){
            //
        }
    }
