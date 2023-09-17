<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *id INT NOT NULL AUTO_INCREMENT,
        nombre VARCHAR(255) NOT NULL,
        alergenos TEXT,
        cuerpo TEXT,
        creation_date DATE NOT NULL,
        update_date DATE NOT NULL,
        id_novio INT NOT NULL,
        PRIMARY KEY (id),
        FOREIGN KEY (id_novio) REFERENCES $wpdb->prefix . 'novios' (id)
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre');
            $table->text('alergenos');
            $table->text('cuerpo');
            $table->date('creation_date');
            $table->date('update_date');
            $table->integer('id_novio')->unsigned();
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
        Schema::dropIfExists('menu');
    }
}
