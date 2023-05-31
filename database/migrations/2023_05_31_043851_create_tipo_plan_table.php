<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_plan', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->integer('precio');
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
        Schema::dropIfExists('tipo_plan');
    }
}
