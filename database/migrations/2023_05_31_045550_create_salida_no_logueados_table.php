<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalidaNoLogueadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salida_no_logueados', function (Blueprint $table) {
            $table->id();
            $table->string('estado_salida');
            $table->dateTime('fecha_hora_salida');
            $table->decimal('monto_excedido', $precision = 8, $scale = 2);
            $table->time('horas_exedidas');
            $table->foreignId('id_ingreso_no_logueados')
                  ->constrained('ingreso_no_logueados')
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
        Schema::dropIfExists('salida_no_logueados');
    }
}
