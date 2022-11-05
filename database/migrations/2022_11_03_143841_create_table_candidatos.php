<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCandidatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_candidatos', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100);
            $table->string('email',100);
            $table->string('telefone',15);
            $table->string('senha',100);
            $table->timestamps();
        });

        /* 
           nao vou fazer relacionamentos no momento 
           Schema::table('table_vagas',function(Blueprint $table){
           $table->unsignedBigInteger('candidato_id');
           $table->foreign('candidato_id')->references('id')->on('table_candidatos');
            }); 
        */

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_candidatos');
    }
}
