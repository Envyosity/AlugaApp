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
        Schema::create('transacao', function (Blueprint $table) {
            $table->increments('idt_transacao');
            $table->integer('idt_locador');
            $table->integer('idt_locatario');
            $table->integer('idt_imovel');
            $table->integer('qte_dia');
            $table->decimal('num_valor', 10, 2);
            $table->dateTime('dat_entrada');
            $table->dateTime('dat_saida');
            $table->index('idt_locador', 'fk_transacao_usuario1_idx');
            $table->index(['idt_imovel', 'idt_locatario'], 'fk_transacao_imovel1_idx');
            $table->foreign('idt_locador')
                  ->references('idt_usuario')->on('usuario')
                  ->onDelete('no action')->onUpdate('no action');
            $table->foreign(['idt_imovel', 'idt_locatario'])
                  ->references(['idt_imovel', 'idt_locatario'])->on('imovel')
                  ->onDelete('no action')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transacao');
    }
};
