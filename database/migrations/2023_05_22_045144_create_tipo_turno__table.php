<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_turno', function (Blueprint $table) {
            $table->id();
            $table->time('hora_ingreso');
            $table->string('nombre');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->foreignId('id_contrato')
            ->constrained('contrato')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_turno');
    }
}
