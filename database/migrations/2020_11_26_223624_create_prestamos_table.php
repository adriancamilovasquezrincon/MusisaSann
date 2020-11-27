<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->bigIncrements('id_prestamo');
            $table->unsignedBigInteger('pres_cliente');
            $table->unsignedBigInteger('pres_pelicula');
            $table->string('fecha_prestada',45);
            $table->string('fecha_devolucion',60);
            $table->string('estadoPelicula',45);
            $table->foreign('pres_cliente')->references('id_cliente')->on('clientes');
            $table->foreign('pres_pelicula')->references('id_pelicula')->on('peliculas');
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
        Schema::dropIfExists('prestamos');
    }
}
