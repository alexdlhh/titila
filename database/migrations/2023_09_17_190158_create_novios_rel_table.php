<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoviosRelTable extends Migration
{
    /**
     * Run the migrations.
     *id INT NOT NULL AUTO_INCREMENT,
        id_novio INT NOT NULL,
        id_ciudad INT NOT NULL,
        restaurantes VARCHAR(255),
        actividades VARCHAR(255),
        imperdibles VARCHAR(255),
        estetica VARCHAR(255),
        alojamiento VARCHAR(255),
        transporte VARCHAR(255),
        id_media_svg INT NOT NULL,
        creation_date DATE NOT NULL,
        update_date DATE NOT NULL,
        PRIMARY KEY (id),
        FOREIGN KEY (id_novio) REFERENCES $wpdb->prefix . 'novios' (id),
        FOREIGN KEY (id_ciudad) REFERENCES $wpdb->prefix . 'ciudad' (id)
     * @return void
     */
    public function up()
    {
        Schema::create('novios_rel', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('id_novio')->unsigned();
            $table->integer('id_ciudad')->unsigned();
            $table->string('restaurantes');
            $table->string('actividades');
            $table->string('imperdibles');
            $table->string('estetica');
            $table->string('alojamiento');
            $table->string('transporte');
            $table->integer('id_media_svg')->unsigned();
            $table->date('creation_date');
            $table->date('update_date');
            $table->foreign('id_novio')->references('id')->on('novios');
            $table->foreign('id_ciudad')->references('id')->on('ciudad');
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
