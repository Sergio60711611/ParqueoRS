<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorarioEmergenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_horario_emergencia', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_actual');
            $table->time('hora_inicio');
            $table->time('hora_cierre');
            $table->string('mensaje');
            $table->foreignId('id_parqueo')
                  ->constrained('parqueo')
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
        Schema::dropIfExists('_horario_emergencia');
    }
}
