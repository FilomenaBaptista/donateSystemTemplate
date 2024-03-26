<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('provincias', function (Blueprint $table) {
            $table->id();
            $table->String('name');
            $table->String('codigo')->nullable();
            $table->string('abreviacao')->unique();

            $table->bigInteger('user_id')->unsigned();
            $table->integer('pais_id')->unsigned();

            $table->foreign('pais_id')->references('id')
                     ->on('pais')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provincias');
    }
};