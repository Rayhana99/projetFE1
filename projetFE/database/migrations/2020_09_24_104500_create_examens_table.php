<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examens', function (Blueprint $table) {
            $table->id();
            $table->string("titre_ressource");
            $table->string("examen_sujet");
            $table->string("type");
            $table->unsignedBigInteger("cour_id")->index();
            $table->timestamps();

            $table->foreign("cour_id")
            ->references("id")
            ->on("cours")
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
        Schema::dropIfExists('examens');
    }
}
