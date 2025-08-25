<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Recuperar Conta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"> <!-- mesmo CSS usado nas outras páginas -->
</head>
<body class="min-vh-100 d-flex flex-column">

    <!-- Logo no topo à esquerda -->
    <div class="p-3">
        <img src="{{ asset('Assets/Logo.png') }}" alt="Logo" class="logo">
    </div>

    <!-- Título centralizado -->
    <h1 class="titulo login">Recuperar Conta</h1>

    <!-- Formulário centralizado -->
    <div class="flex-grow-1 d-flex justify-content-center align-items-center">
        <div class="login-form p-4">
            
            <!-- Exibe erros de validação -->
            @if($errors->any())
                <div class="alert alert-danger text-center">{{ $errors->first() }}</div>
            @endif

            <p class="text-center mb-4">Informe o e-mail cadastrado para recuperar o acesso à sua conta.</p>

            <form method="POST" action="{{ url('/forgot') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">E-mail cadastrado:</label>
                    <input type="email" name="email" class="form-control" required placeholder="Digite seu e-mail">
                </div>
                <button type="submit" class="btn btn-custom btn-entrar w-100">
                    Continuar
                </button>
            </form>

            <!-- Link para voltar ao login -->
            <div class="text-center mt-3">
                <a href="{{ route('login') }}" class="link-light">
                    <i class="bi bi-rewind-fill"></i> Voltar
                </a>
            </div>
        </div>
    </div>

</body>
</html>
