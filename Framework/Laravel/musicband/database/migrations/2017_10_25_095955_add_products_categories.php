<?php
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;
    class AddProductsCategories extends Migration{
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up(){
            Schema::table('products', function(Blueprint $table){
                $table->integer('category_id')->unsigned()->nullable();
                $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
                Schema::enableForeignKeyConstraints();
            });
        }
        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down(){
            Schema ::table('products', function(Blueprint $table){
                Schema::enableForeignKeyConstraints();
                $table->dropForeign('products_category_id_foreign');
                $table->dropColumn('category_id');
            });
        }
    }
