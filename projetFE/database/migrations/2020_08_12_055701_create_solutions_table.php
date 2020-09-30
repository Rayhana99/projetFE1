<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solutions', function (Blueprint $table) {
            $table->id();
            $table->string("reponse");
            $table->unsignedBigInteger("etudiant_id")->index();
            $table->unsignedBigInteger("exercice_id")->index();
            $table->timestamps();

            $table->foreign("etudiant_id")
            ->references("id")
            ->on("etudiants")
            ->onUpdate("CASCADE")
            ->onDelete("CASCADE");
            $table->foreign("exercice_id")
            ->references("id")
            ->on("exercices")
            ->onUpdate("CASCADE")
            ->onDelete("CASCADE");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solutions');
    }
}
