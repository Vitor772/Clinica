<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Mostrar o formulário de login
    public function showLoginForm()
    {
        return view('auth.login');  // Aqui você cria a view 'auth.login' para o formulário
    }

    // Realizar o login
    public function login(Request $request)
    {
        // Validar os dados de entrada
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Tentar fazer o login com as credenciais
        if (Auth::attempt($validated)) {
            // Redirecionar o usuário para a página inicial ou a última página visitada
            return redirect()->intended('/');
        }

        // Se falhar, redirecionar de volta com erro
        return back()->withErrors([
            'email' => 'As credenciais fornecidas são inválidas.',
        ]);
    }

    // Realizar o logout
    public function logout(Request $request)
    {
        Auth::logout(); // Encerra a sessão do usuário
        $request->session()->invalidate(); // Invalida a sessão
        $request->session()->regenerateToken(); // Regenera o token CSRF para segurança

        return redirect()->route('login'); // Redireciona para a página de login
    }
}
