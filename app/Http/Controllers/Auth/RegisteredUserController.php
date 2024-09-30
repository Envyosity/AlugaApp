<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Exibe o formulário de registro.
     */
    public function create()
    {
        return view('auth.register'); // Certifique-se de que esta view exista em resources/views/auth/
    }

    /**
     * Handle an incoming registration request.
     */
    public function store(Request $request)
    {
        // Validação dos dados do formulário de registro
        $request->validate([
            'des_nome' => 'required|string|max:255',
            'des_email' => 'required|string|email|max:255|unique:usuario,des_email',
            'des_cpf' => 'required|string|max:14|unique:usuario,des_cpf',
            'des_numero_celular' => 'required|string|max:15', // Validação do número de celular
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Criação do usuário na tabela 'usuario'
        $user = User::create([
            'des_nome' => $request->des_nome,
            'des_email' => $request->des_email,
            'des_cpf' => $request->des_cpf,
            'des_numero_celular' => $request->des_numero_celular, // Armazena o número de celular
            'password' => Hash::make($request->password),
        ]);

        // Dispara um evento de registro do usuário
        event(new Registered($user));

        // Autentica o usuário recém-registrado
        Auth::guard('web')->login($user);

        // Redireciona para a página desejada (por exemplo, o dashboard)
        return redirect('/dashboard');
    }
}
