<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoviosPreferenciasTable extends Migration
{
    /**
     * Run the migrations.
     *id INT NOT NULL AUTO_INCREMENT,
        novio VARCHAR(255) NOT NULL,
        novia VARCHAR(255) NOT NULL,
        fecha_boda DATE NOT NULL,
        fuente VARCHAR(255) NOT NULL,
        color VARCHAR(255) NOT NULL,
        font_size VARCHAR(255) NOT NULL,
        mensaje TEXT,
        id_media_svg INT NOT NULL,
        creation_date DATE NOT NULL,
        update_date DATE NOT NULL,
        title_size VARCHAR(255),
        color_fondo VARCHAR(255),
        color_texto VARCHAR(255),
        patron VARCHAR(255),
        id_novio INT NOT NULL,
        PRIMARY KEY (id),
        FOREIGN KEY (id_media_svg) REFERENCES $wpdb->prefix . 'media_svg' (id)
        FOREIGN KEY (id_novio) REFERENCES $wpdb->prefix . 'novios' (id)
     * @return void
     */
    public function up()
    {
        Schema::create('novios_preferencias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('novio');
            $table->string('novia');
            $table->date('fecha_boda');
            $table->string('fuente');
            $table->string('color');
            $table->string('font_size');
            $table->text('mensaje');
            $table->integer('id_media_svg')->unsigned();
            $table->date('creation_date');
            $table->date('update_date');
            $table->string('title_size');
            $table->string('color_fondo');
            $table->string('color_texto');
            $table->string('patron');
            $table->integer('id_novio')->unsigned();
            $table->foreign('id_media_svg')->references('id')->on('media_svg');
            $table->foreign('id_novio')->references('id')->on('novios');
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
