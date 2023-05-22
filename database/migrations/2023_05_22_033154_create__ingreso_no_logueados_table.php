<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresoNoLogueadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_ingreso_no_logueados', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_hora_ingreso');
            $table->String('nombre');
            $table->String('apellido');
            $table->integer('ci')->unique();
            $table->integer('placa')->unique();
            $table->integer('monto');
            $table->integer('cantidad_horas');
            $table->time('hora_salida');
            $table->foreignId('id_sitio')
                  ->constrained('sitio')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
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
        Schema::dropIfExists('_ingreso_no_logueados');
    }
}
