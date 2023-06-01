<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanMensualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_mensual', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_plan');
            $table->string('dias_validez');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->decimal('precio_plan');
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
        Schema::dropIfExists('plan_mensual');
    }
}
