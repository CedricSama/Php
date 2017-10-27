<?php
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;
    class CreateCommandesTable extends Migration{
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up(){
            Schema::create(
                'commandes', function(Blueprint $table){
                $table->increments('id');
                $table->timestamps();
                $table->string('civilite');
                $table->string('nom');
                $table->string('prenom');
                $table->string('email');
                $table->string('adresse');
                $table->string('adresse2')->nullable();
                $table->string('ville');
                $table->string('code_postal');
                $table->string('pays');
                $table->string('telephone');
            });
        }
        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down(){
            Schema::dropIfExists('commandes');
        }
    }
