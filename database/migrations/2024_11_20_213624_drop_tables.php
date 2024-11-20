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
        Schema::table('imovel', function (Blueprint $table) {
            $table->dropColumn(['usuario_idt_usuario_user_id', 'idt_imovel_transacaos_idt_locatario', 'idt_locatario_transacaos_idt_locatario', 'idt_imovel_transacaos_idt_imovel', 'idt_locatario_transacaos_idt_imovel']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
