<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->double("note");
            $table->unsignedBigInteger("etudiant_id")->index();
            $table->unsignedBigInteger("examan_id")->index();
            $table->timestamps();

            $table->foreign("etudiant_id")
            ->references("id")
            ->on("etudiants")
            ->onUpdate("CASCADE")
            ->onDelete("CASCADE");
            $table->foreign("examan_id")
            ->references("id")
            ->on("examans")
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
        Schema::dropIfExists('evaluations');
    }
}
