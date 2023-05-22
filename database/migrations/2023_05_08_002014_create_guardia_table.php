<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuardiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardia', function (Blueprint $table) {
            $table->id();
            $table->ipAddress('nombre');
            $table->ipAddress('apellido');
            $table->ipAddress('direccion');
            $table->integer('celular');
            $table->ipAddress('correo_electronico');
            $table->integer('ci')->unique();
            $table->ipAddress('password');
            $table->foreignId('id_parqueo')
                  ->constrained('parqueo')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            $table->foreignId('id_contrato')
                  ->constrained('contrato')
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
        Schema::dropIfExists('guardia');
    }
}
