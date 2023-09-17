<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransporteTable extends Migration
{
    /**
     * Run the migrations.
     *id INT NOT NULL AUTO_INCREMENT,
        nombre VARCHAR(255) NOT NULL,
        creation_date DATE NOT NULL,
        update_date DATE NOT NULL,
        descripcion TEXT,
        portada VARCHAR(255),
        id_ciudad INT NOT NULL,
        web VARCHAR(255),
        PRIMARY KEY (id),
        FOREIGN KEY (id_ciudad) REFERENCES $wpdb->prefix . 'ciudad' (id)
     * @return void
     */
    public function up()
    {
        Schema::create('transporte', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre');
            $table->date('creation_date');
            $table->date('update_date');
            $table->text('descripcion');
            $table->string('portada');
            $table->integer('id_ciudad')->unsigned();
            $table->string('web');
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
        Schema::dropIfExists('transporte');
    }
}
