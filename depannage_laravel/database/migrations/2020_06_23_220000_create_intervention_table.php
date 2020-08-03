<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterventionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intervention', function(Blueprint $table){
            $table->increments('id');
            $table->date('date_fin');
            $table->integer('ouvriers_id')->unsigned();
            $table->foreign('ouvriers_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('annonces_id')->unsigned();
            $table->foreign('annonces_id')->references('id')->on('annonces')->onDelete('cascade');
            $table->integer('note');
            $table->timestamps();
            $table->softDeletes();
        });
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interventions');
    }
}
