<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatronTable extends Migration
{
    /**
     * Run the migrations.
     *id INT NOT NULL AUTO_INCREMENT,
        nombre VARCHAR(255) NOT NULL,
        ruta VARCHAR(255) NOT NULL,
        ruta_negativo VARCHAR(255) NOT NULL,
        creation_date DATE NOT NULL,
        update_date DATE NOT NULL,
        PRIMARY KEY (id),
     * @return void
     */
    public function up()
    {
        Schema::create('patron', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre');
            $table->string('ruta');
            $table->string('ruta_negativo');
            $table->date('creation_date');
            $table->date('update_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patron');
    }
}
