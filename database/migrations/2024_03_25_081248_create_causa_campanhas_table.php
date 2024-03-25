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
        Schema::create('causa_campanhas', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo', ['Solicitação','Execução']);
            $table->enum('accao', ['Eliminada','Rejeitada'])->nullable();
            $table->text('causa');
            $table->unsignedBigInteger('campanha_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('campanha_id')->references('id')->on('campanhas')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('causa_campanhas');
    }
};
