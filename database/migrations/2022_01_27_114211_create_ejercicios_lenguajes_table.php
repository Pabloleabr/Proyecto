<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEjerciciosLenguajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ejercicios_lenguajes', function (Blueprint $table) {
            $table->foreignId('ejercicio_id')->constrained();
            $table->foreignId('lenguaje_id')->constrained();
            $table->primary(['ejercicio_id', 'lenguaje_id']);
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
        Schema::dropIfExists('ejercicios_lenguajes');
    }
}
