<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("etudiant_id")->index();
            $table->unsignedBigInteger("cour_id")->index();
            $table->timestamps();

           $table->foreign("etudiant_id")
            ->references("id")
            ->on("etudiants")
            ->onUpdate("CASCADE")
            ->onDelete("CASCADE");

            $table->foreign("cour_id")
            ->references("id")
            ->on("cours")
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
        Schema::dropIfExists('inscriptions');
    }
}
