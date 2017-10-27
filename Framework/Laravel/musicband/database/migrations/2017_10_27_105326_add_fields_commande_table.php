<?php
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;
    class AddFieldsCommandeTable extends Migration{
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up(){
            Schema::table('commandes', function(Blueprint $table){
                $table->float('prix_total_ht');
                $table->float('prix_total_promo_ht');
                $table->float('prix_total_ttc');
                $table->float('prix_total_promo_ttc');
                $table->string('remise_name')->nullable();
                $table->string('remise_value')->nullable();
            });
        }
        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down(){
            Schema::table('commandes', function(Blueprint $table){
                $table->dropColumn('prix_total_ht');
                $table->dropColumn('prix_total_promo_ht');
                $table->dropColumn('prix_total_ttc');
                $table->dropColumn('prix_total_promo_ttc');
                $table->dropColumn('remise_name')->nullable();
                $table->dropColumn('remise_value')->nullable();
            });
        }
    }
