<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministrateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrateurs', function (Blueprint $table) {
           
            // $table->id();
            // $table->string('prenom');
            // $table->string('nom');
            // $table->string('genre');
            // $table->date('date_de_naissance');
            // $table->string('pays');
            // $table->string('email');
            // $table->string('mot_de_passe');
            // $table->timestamps(); 
            $table->bigIncrements('id');
            //$table->string('prenom');
            $table->string('name');
            $table->string('email')->unique();
           // $table->string('genre');
           // $table->date('dateDeNaissance');
           // $table->string('pays');
            $table->string('password');
            $table->boolean('is_super')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('administrateurs');
    }
}
