<?php
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;
    class CreateCommandeProductsTable extends Migration{
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up(){
            Schema::create('commande_products', function(Blueprint $table){
                $table->increments('id');
                $table->timestamps();
                $table->integer('produit_id')->unsigned();
                $table->integer('commande_id')->unsigned();
                $table->foreign('produit_id')->references('id')->on('products')->onDelete('cascade');
                $table->foreign('commande_id')->references('id')->on('commandes')->onDelete('cascade');
                $table->integer('quantity');
                $table->float('prix_unit_ttc');
                $table->float('prix_total_ttc');
            });
        }
        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down(){
            Schema::dropIfExists('commande_products');
        }
    }
