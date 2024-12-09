<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imoveis extends Model
{
    use HasFactory;

    // Nome da tabela no banco de dados
    protected $table = 'imoveis';

    // Nome da chave primária
    protected $primaryKey = 'idt_imovel';

    // Define se a chave primária é auto-incremental
    public $incrementing = true;

    // Tipo da chave primária
    protected $keyType = 'int';

    // Habilita os timestamps
    public $timestamps = true;

    // Campos que podem ser preenchidos em massa
    protected $fillable = [
        'des_nome',
        'num_valor',
        'num_tamanho',
        'des_informacoes',
        'des_endereco',
        'des_bairro',
        'des_cidade',
        'des_estado',
        'des_pais',
    ];

    // Fábrica personalizada (se necessário)
    protected static function newFactory()
    {
        return \Database\Factories\ImoveisFactory::new();
    }
}
