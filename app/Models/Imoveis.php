<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//e interage com a tabela imoveis no banco de dados.
// Ele usa o trait HasFactory para permitir a criação de fábricas,
// facilitando a geração de dados falsos para testes ou preenchimento da base de dados.
class Imoveis extends Model
{
    use HasFactory;
}
