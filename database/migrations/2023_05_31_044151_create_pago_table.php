<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pago', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_pago');
            $table->decimal('monto_pagado', $precision = 8, $scale = 2);
            $table->foreignId('id_reserva')
                  ->nullable()
                  ->constrained('reserva')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
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
        Schema::dropIfExists('pago');
    }
}
