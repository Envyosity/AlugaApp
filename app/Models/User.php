<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Define a tabela personalizada
    protected $table = 'usuario';

    // Define a chave primária personalizada
    protected $primaryKey = 'idt_usuario';

    // Desativa timestamps, caso a tabela 'usuario' não os utilize
    public $timestamps = false;

    /**
     * Os atributos que podem ser preenchidos em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'des_nome',
        'des_email',
        'des_cpf',
        'des_numero_celular',
        'password',
    ];

    /**
     * Os atributos que devem ser ocultos para a serialização.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Os atributos que devem ser convertidos para tipos específicos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // Se estiver usando hashing de senhas
    ];
}
