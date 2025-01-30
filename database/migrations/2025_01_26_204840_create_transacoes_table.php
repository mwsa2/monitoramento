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
        Schema::create('transacoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')->constrained(table: 'usuarios', indexName: 'transacoes_usuarios_id')->onUpdate('cascade')->onDelete('no action');
            $table->foreignId('id_categoria')->constrained(table: 'categorias', indexName: 'categorias_usuarios_id')->onUpdate('cascade')->onDelete('no action');
            $table->tinyInteger('tipo');
            $table->double('valor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transacoes');
    }
};
