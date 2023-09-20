<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoviosRelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novios_rel', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_novio')->unsigned();
            $table->bigInteger('id_ciudad')->unsigned();
            $table->string('restaurantes');
            $table->string('actividades');
            $table->string('imperdibles');
            $table->string('estetica');
            $table->string('alojamiento');
            $table->string('transporte');
            $table->integer('id_media_svg')->unsigned();
            $table->foreign('id_novio')->references('id')->on('novios');
            $table->foreign('id_ciudad')->references('id')->on('ciudad');
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
        Schema::dropIfExists('novios_rel');
    }
}
