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
            $table->longText('capa')->nullable()->default('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAjAAAAEsCAIAAABSbx5FAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA35pVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTMyIDc5LjE1OTI4NCwgMjAxNi8wNC8xOS0xMzoxMzo0MCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDpBQUI1MzJCNDJFMjA2ODExODIyQTk5MDk2MEVGMEFCNSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDoyREVERjgzNDQ4OEQxMUU4QURGQjg1OEVBNTFBMUYyMSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDoyREVERjgzMzQ4OEQxMUU4QURGQjg1OEVBNTFBMUYyMSIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M2IChNYWNpbnRvc2gpIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6MTYyMDAwOTAtODI2MS01NTQ5LThmNzctZmE0NTdjZTAzMGE4IiBzdFJlZjpkb2N1bWVudElEPSJhZG9iZTpkb2NpZDpwaG90b3Nob3A6NGUwOGMwODAtNDgwYy0xMWU4LWI0ZWYtYTNkMTM4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');
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
