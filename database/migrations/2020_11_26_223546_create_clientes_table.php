<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id_cliente');
            $table->string('num_cedula',15);
            $table->string('nombres',45);
            $table->string('apellidos',45);
            $table->string('direccion',45);
            $table->string('telefono',60);
            $table->string('email',45);
            $table->integer('nro_cliente');
            $table->string('estado_prestamo',45);
            $table->string('tipo_persona',60);
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
        Schema::dropIfExists('clientes');
    }
}
