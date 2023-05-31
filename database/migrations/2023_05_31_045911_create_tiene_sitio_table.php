<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTieneSitioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiene_sitio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_reserva')
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
        Schema::dropIfExists('tiene_sitio');
    }
}
