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
                $table->string('estado_ingreso');
                $table->integer('cantidad_horas');
                $table->foreignId('id_sitio')
                      ->constrained('sitio')
                      ->cascadeOnUpdate()
                      ->cascadeOnDelete();
                $table->unsignedBigInteger('id_sitio_emergencia')->nullable();
                $table->foreign('id_sitio_emergencia')->references('id')->on('sitio_emergencia');
                $table->foreignId('id_vehiculo')
                      ->constrained('vehiculo')
                      ->cascadeOnUpdate()
                      ->cascadeOnDelete();
                $table->foreignId('id_reserva')
                      ->constrained('reserva')
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
