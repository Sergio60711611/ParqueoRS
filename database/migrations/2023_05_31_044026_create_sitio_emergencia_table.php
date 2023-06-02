<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitioEmergenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sitio_emergencia', function (Blueprint $table) {
            $table->id();
            $table->integer('nro_sitioE');
            $table->string('estadoE');
            $table->foreignId('id_parqueo')
            ->constrained('parqueo')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->foreignId('id_cliente')
            ->constrained('cliente')
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
        Schema::dropIfExists('sitio_emergencia');
    }
}
