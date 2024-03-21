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
        Schema::create('doacao_bens_materiais', function (Blueprint $table) {
            $table->id();
            $table->string('capa', 255)->nullable();
            $table->string('anuncio');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('qtd_itens_doar');
            $table->string('local');
            $table->string('estado_artigo');
            $table->text('descricao');
            $table->enum('is_anonimo',[1,0]);
            $table->unsignedBigInteger('user_id');
            $table->enum('eliminado',[0, 1])->default(0);
            $table->enum('estado_doacao', ['Pendente', 'Aprovado', 'Rejeitado', 'Concluido'])->default('Pendente');

            $table->foreign('categoria_id')->references('id')->on('categorias')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')
            ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doacao_bens_materiais');
    }
};
