<?php
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;
    class AddFieldsUsersTable extends Migration{
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up(){
            Schema::table('users', function(Blueprint $table){
                $table->boolean('is_admin')->default(0);
                $table->string('prenom')->nullable();
            });
        }
        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down(){
            Schema::table('users', function(Blueprint $table){
                $table->dropColumn('is_admin')->default(0);
                $table->dropColumn('prenom')->nullable();
            });
        }
    }
