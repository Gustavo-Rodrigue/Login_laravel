<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Bem-vindo</title>
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
    <h1 class="titulo">🎉 Bem-vindo, {{ $usuario->name }}! 🎉</h1>

    <!-- Mensagem de boas-vindas -->
    <div class="flex-grow-1 d-flex justify-content-center align-items-center">
        <div class="login-form p-4 text-center">
            <p class="mb-4 fs-5">
                👋 Olá <strong>{{ $usuario->name }}</strong>, estamos felizes em ter você de volta!  
                <br> Aproveite sua jornada no sistema 🚀✨
            </p>

            <!-- Botão sair -->

            <a class="btn btn-custom btn-entrar w-100" href="{{ route('home') }}"><i class="bi bi-box-arrow-right"></i>  Sair</a>
        </div>
    </div>

</body>
</html>
