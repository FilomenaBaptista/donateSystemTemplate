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
        Schema::create('campanhas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descricao');
            $table->enum('categoria',['Medicina', 'Educação','Alimento','Calçado','Roupas','Decorações','Eletrodomésticos','Acessórios e ração animal','Beleza/Cuidado corporal','Artesanato','Construção e renovação','Cozinha e utensílios de mesa','Manuteção Doméstica','Jardim','Jogos e Brinquedos','Lazer','Equipamento de Escritório','Mobiliário','Tecnologia','Esporte' ]);
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('campanhas');
    }
};
