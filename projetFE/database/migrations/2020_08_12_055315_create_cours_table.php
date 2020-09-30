<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cours', function (Blueprint $table) {
            $table->id();
            $table->string("titre_cour");
            $table->string("description");
            $table->unsignedBigInteger("enseignant_id")->index();
           
            $table->timestamps();

           /* $table->integer('enseignant_id')->nullable()->unsigned();*/


           $table->foreign("enseignant_id")
            ->references("id")
            ->on("enseignants")
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
        Schema::dropIfExists('cours');
    }
}
