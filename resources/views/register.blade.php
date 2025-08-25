<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"> <!-- mesmo CSS da página inicial/login -->
</head>
<body class="min-vh-100 d-flex flex-column">

    <!-- Logo no topo à esquerda -->
    <div class="p-3">
        <img src="{{ asset('Assets/Logo.png') }}" alt="Logo" class="logo">
    </div>

    <!-- Título centralizado -->
    <h1 class="titulo cadastro">Cadastrar</h1>

    <!-- Formulário centralizado -->
    <div class="flex-grow-1 d-flex justify-content-center align-items-center">
        <div class="login-form p-4">
            
            <!-- Exibe erros de validação -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $erro)
                            <li>{{ $erro }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Botão voltar -->
            <div class="d-flex justify-content-end">
                <a href="{{ route('login') }}"> <i class="bi bi-rewind-fill"></i> Voltar</a>
            </div>

            <form method="POST" action="{{ url('/register') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nome:</label>
                    <input type="text" name="name" class="form-control" required placeholder="Digite seu nome">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" name="email" class="form-control" required placeholder="Digite seu email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Senha:</label>
                    <input type="password" name="password" class="form-control" required placeholder="Digite sua senha">
                </div>
                <div class="mb-3">
                    <label class="form-label">Confirmar Senha:</label>
                    <input type="password" name="password_confirmation" class="form-control" required placeholder="Confirme sua senha">
                </div>
                <button type="submit" class="btn btn-custom btn-cadastrar w-100">Cadastrar</button>
            </form>

            <div class="text-center mt-3">
                <a href="{{ route('login') }}" class="link-light">Já tem conta? Entrar</a>
            </div>
        </div>
    </div>

</body>
</html>
