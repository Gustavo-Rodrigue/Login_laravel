<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Exibe a página inicial com botões de login e cadastro
    public function home()
    {
        // Retorna a view 'home.blade.php'
        return view('home');
    }

    // Exibe o formulário de login
    public function mostrarLogin()
    {
        // Retorna a view 'login.blade.php'
        return view('login');
    }

    // Processa o login do usuário
    public function login(Request $request)
    {
        // Pega apenas os campos email e senha do request
        $credenciais = $request->only('email', 'password');
        // Tenta autenticar o usuário com as credenciais fornecidas
        if (Auth::attempt($credenciais)) {
            // Se autenticado, regenera a sessão por segurança
            $request->session()->regenerate();
            // Redireciona para a página de boas-vindas
            return redirect()->route('bemvindo');
        }
        // Se falhar, retorna para o login com erro
        return back()->withErrors(['email' => 'Email ou Senha Invalidos.']);
    }

    // Exibe o formulário de cadastro
    public function mostrarCadastro()
    {
        // Retorna a view 'register.blade.php'
        return view('register');
    }

    // Processa o cadastro do usuário
    public function cadastrar(Request $request)
    {
        // Valida os dados do formulário
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:4|confirmed',
        ]);
        // Cria o usuário no banco de dados
        $usuario = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // Faz login automático após cadastro
        Auth::login($usuario);
        // Redireciona para a página de boas-vindas
        return redirect()->route('bemvindo');
    }

    // Exibe o formulário de "esqueceu a senha"
    public function mostrarEsqueciSenha()
    {
        // Retorna a view 'forgot.blade.php'
        return view('forgot');
    }

    // Processa o envio do email para redefinição
    public function processarEsqueciSenha(Request $request)
    {
        // Valida o email informado
        $request->validate(['email' => 'required|email']);
        // Busca o usuário pelo email
        $usuario = User::where('email', $request->email)->first();
        // Se não encontrar, retorna erro
        if (!$usuario) {
            return back()->withErrors(['email' => 'Email não encontrado.']);
        }
        // Salva o email na sessão para o próximo passo
        session(['reset_email' => $usuario->email]);
        // Redireciona para o formulário de redefinição
        return redirect()->route('reset');
    }

    // Exibe o formulário para redefinir email e senha
    public function mostrarRedefinir()
    {
        // Se não houver email na sessão, volta para o esqueceu a senha
        if (!session('reset_email')) {
            return redirect()->route('forgot');
        }
        // Passa o email para a view
        return view('reset', ['email' => session('reset_email')]);
    }

    // Processa a redefinição de email e senha
    public function processarRedefinir(Request $request)
    {
        // Valida os dados do formulário (mínimo de senha: 4)
        $request->validate([
            'email' => 'required|email',
            'new_email' => 'required|email|unique:users,email,' . User::where('email', $request->email)->first()->id,
            'password' => 'required|string|min:4|confirmed',
        ]);
        // Busca o usuário pelo email
        $usuario = User::where('email', $request->email)->first();
        // Se não encontrar, volta para o esqueceu a senha
        if (!$usuario) {
            return redirect()->route('forgot')->withErrors(['email' => 'Email não encontrado.']);
        }
        // Verifica se a nova senha é igual à antiga
        if (\Hash::check($request->password, $usuario->password)) {
            return back()->withErrors(['password' => 'Sua senha não pode ser igual a anterior.'])->withInput();
        }
        // Atualiza email e senha
        $usuario->email = $request->new_email;
        $usuario->password = \Hash::make($request->password);
        $usuario->save();
        // Faz login automático após redefinir
        \Auth::login($usuario);
        // Limpa o email da sessão
        session()->forget('reset_email');
        // Redireciona para a página de sucesso
        return redirect()->route('login');
    }
    // Exibe a página de boas-vindas após login/cadastro
    public function bemVindo()
    {
        // Passa o usuário autenticado para a view
        $usuario = Auth::user();
        return view('bemvindo', ['usuario' => $usuario]);
    }
}
