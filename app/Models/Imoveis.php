<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Classe Imoveis que representa o modelo da tabela `imoveis` no banco de dados.
 */
class Imoveis extends Model
{
    use HasFactory;

    /**
     * Nome da tabela associada a este modelo.
     */
    protected $table = 'imoveis'; // Nome da tabela no banco de dados

    /**
     * Chave primária personalizada.
     */
    protected $primaryKey = 'idt_imovel'; // Nome da chave primária

    /**
     * Define se a chave primária é auto-incremental.
     */
    public $incrementing = true;

    /**
     * Tipo da chave primária.
     */
    protected $keyType = 'int';

    /**
     * Define se o modelo deve usar timestamps.
     */
    public $timestamps = true; // Ativa os campos created_at e updated_at

    /**
     * Define os campos que podem ser preenchidos em massa.
     */
    protected $fillable = [
        'des_nome',
        'num_valor',
        'num_tamanho',
        'des_informacoes',
        'des_endereco',
        'des_bairro',
        'des_cidade',
        'des_estado',
    ];

    /**
     * Define uma fábrica personalizada, se necessário.
     */
    protected static function newFactory()
    {
        return \Database\Factories\ImoveisFactory::new();
    }
}
