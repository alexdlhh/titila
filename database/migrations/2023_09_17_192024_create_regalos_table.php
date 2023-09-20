<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegalosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regalos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->date('link');
            $table->text('mensaje');
            $table->string('portada');
            $table->integer('estado');
            $table->bigInteger('id_novio')->unsigned();
            $table->foreign('id_novio')->references('id')->on('novios');
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
        Schema::dropIfExists('regalos');
    }
}
