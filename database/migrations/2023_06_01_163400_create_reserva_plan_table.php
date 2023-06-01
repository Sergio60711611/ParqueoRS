<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservaPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_plan', function (Blueprint $table) {
            $table->id();
            $table->datetime('reserva_inicio');
            $table->datetime('reserva_fin');
            $table->string('estado');
            $table->foreignId('id_plan_mensual')
            ->constrained('plan_mensual')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->foreignId('id_cliente')
                  ->constrained('cliente')
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
        Schema::dropIfExists('reserva_plan');
    }
}
