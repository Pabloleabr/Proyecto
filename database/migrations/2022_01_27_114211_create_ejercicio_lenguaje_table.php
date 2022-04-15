<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEjercicioLenguajeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ejercicio_lenguaje', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ejercicio_id')->constrained();
            $table->foreignId('lenguaje_id')->constrained();
            $table->unique(['ejercicio_id', 'lenguaje_id']);
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
        Schema::dropIfExists('ejercicio_lenguaje');
    }
}
