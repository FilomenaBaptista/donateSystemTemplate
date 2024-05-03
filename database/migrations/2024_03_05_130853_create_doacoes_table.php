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
        Schema::create('doacoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doador_id');
            $table->unsignedBigInteger('campanha_id')->nullable();
            $table->unsignedBigInteger('bem_material_id')->nullable();
            $table->decimal('quantia', 10, 2)->nullable()->default(0);
            $table->enum('estado',['Pendente', 'Aceite','Cancelado',"Não Aceite"]);
            $table->enum('tipo',['Campanha', 'Bens Materiais']);
            $table->text('descricao')->nullable();
            $table->enum('eliminado',[0, 1])->default(0);
            $table->timestamps();

            $table->foreign('doador_id')->references('id')->on('users')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('campanha_id')->references('id')->on('campanhas')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('bem_material_id')->references('id')->on('doacao_bens_materiais')->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doacoes');
    }
};
