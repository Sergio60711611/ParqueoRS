<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalidaNoLoginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salidanologin', function (Blueprint $table) {
            $table->id();
            $table->datetime('fecha_hora_salida');
            $table->integer('monto_exedido');
            $table->datetime('horas_exedidas');
            $table->foreignId('id_ingreso_no')
                    ->constrained('ingresonologueados')
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
        Schema::dropIfExists('salidanologin');
    }
}
