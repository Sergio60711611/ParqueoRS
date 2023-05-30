<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingreso', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_hora_ingreso');
            $table->foreignId('id_sitio')
                  ->constrained('sitio')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            $table->foreignId('id_salida')
                  ->constrained('salida')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            $table->foreignId('id_vehiculo')
                  ->constrained('vehiculo')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();   
            $table->foreignId('id_sitEmer')
                  ->nullable()
                  ->constrained('sitio_emergencia')
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
        Schema::dropIfExists('ingreso');
    }
}
