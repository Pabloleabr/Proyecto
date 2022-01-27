<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateRatingEjerciciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating_ejercicios', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->foreignId('ejercicio_id')->constrained();
            $table->integer('rating');
            $table->timestamps();
            $table->primary(['user_id', 'ejercicio_id']);
        });
        DB::statement('ALTER TABLE rating_ejercicios ADD CONSTRAINT CK_MAX_RATING CHECK (rating <= 5)');
        DB::statement('ALTER TABLE rating_ejercicios ADD CONSTRAINT CK_MIN_RATING CHECK (rating >= 0)');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rating_ejercicios');
    }
}
