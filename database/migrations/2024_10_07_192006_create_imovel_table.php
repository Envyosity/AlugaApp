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
        Schema::create('imovel', function (Blueprint $table) {
            $table->increments('idt_imovel');
            $table->string('des_nome', 45);
            $table->decimal('num_valor', 10, 2);
            $table->decimal('num_tamanho', 10, 2);
            $table->longText('des_informacoes');
            $table->integer('idt_locatario');
            $table->string('des_endereco', 45);
            $table->string('des_bairro', 45);
            $table->string('des_cidade', 45);
            $table->string('des_estado', 45);
            $table->string('des_pais', 45);
            $table->integer('usuario_idt_usuario');
            $table->primary(['idt_imovel', 'idt_locatario']);
            $table->unique('idt_imovel', 'idt_imovel_UNIQUE');
            $table->index('usuario_idt_usuario', 'fk_imovel_usuario1_idx');
            $table->foreign('usuario_idt_usuario')
                ->references('id')->on('users')
                ->onDelete('no action')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imovel');
    }
};
