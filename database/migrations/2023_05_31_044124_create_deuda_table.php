<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeudaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deuda', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_notificacion');
            $table->float('monto_pendiente', $precision = 8, $scale = 2);
            $table->integer('horas');
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
        Schema::dropIfExists('deuda');
    }
}
