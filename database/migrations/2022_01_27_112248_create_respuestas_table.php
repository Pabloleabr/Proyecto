<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas', function (Blueprint $table) {
            $table->id();
            $table->text('respuesta');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('ejercicio_id')->nullable()->constrained();
            $table->foreignId('pregunta_id')->nullable()->constrained();
            $table->timestamps();
            $table->unique(['user_id', 'ejercicio_id']);
            $table->unique(['user_id', 'pregunta_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respuestas');
    }
}
