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
        Schema::table('campanhas', function (Blueprint $table) {
            $table->enum('eliminado',[0, 1])->after('user_id');
            $table->unsignedBigInteger('categoria_id')->after('user_id');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('campanhas', function (Blueprint $table) {
            $table->dropColumn('eliminado');
            $table->dropColumn('categoria_id');
        });
    }
};
