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
        Schema::create('ingreso_no_logueados', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_hora_ingreso');
            $table->String('nombre');
            $table->String('apellido');
            $table->integer('ci')->unique()->nullable();;
            $table->String('placa');
            $table->decimal('monto', $precision = 8, $scale = 2);
            $table->integer('cantidad_horas');
            $table->time('hora_salida');
            $table->string('estado_ingreso');
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
        Schema::dropIfExists('ingreso_no_logueados');
    }
}
