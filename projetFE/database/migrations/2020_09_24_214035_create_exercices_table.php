<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExercicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercices', function (Blueprint $table) {
            $table->id();
            $table->integer("num_exercice");
            $table->string("contenu");
            $table->unsignedBigInteger("examen_id")->index();
            $table->timestamps();

            $table->foreign("examen_id")
            ->references("id")
            ->on("examens")
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
        Schema::dropIfExists('exercices');
    }
}
