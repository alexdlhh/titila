<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoviosPreferenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novios_preferencias', function (Blueprint $table) {
            $table->id();
            $table->string('novio');
            $table->string('novia');
            $table->date('fecha_boda');
            $table->string('fuente');
            $table->string('color');
            $table->string('font_size');
            $table->text('mensaje');
            $table->bigInteger('id_media_svg')->unsigned();
            $table->string('title_size');
            $table->string('color_fondo');
            $table->string('color_texto');
            $table->string('patron');
            $table->bigInteger('id_novio')->unsigned();
            $table->foreign('id_media_svg')->references('id')->on('media_svg');
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
        Schema::dropIfExists('novios_preferencias');
    }
}
