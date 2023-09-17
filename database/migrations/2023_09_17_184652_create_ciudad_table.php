<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCiudadTable extends Migration
{
    /**
     * Run the migrations.
     *  id INT NOT NULL AUTO_INCREMENT,
        nombre VARCHAR(255) NOT NULL,
        alias VARCHAR(255) NOT NULL,
        descripcion TEXT,
        portada VARCHAR(255),
        creation_date DATE NOT NULL,
        update_date DATE NOT NULL
        PRIMARY KEY (id)
     * @return void
     */
    public function up()
    {
        Schema::create('ciudad', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('alias');
            $table->text('descripcion');
            $table->string('portada');
            $table->date('creation_date');
            $table->date('update_date');
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
        Schema::dropIfExists('ciudad');
    }
}
