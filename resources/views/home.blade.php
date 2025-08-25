<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Início</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"> <!-- link do CSS externo -->
</head>
<body class="min-vh-100 d-flex flex-column">

    <!-- Logo no topo à esquerda -->
    <div class="p-3">
        <img src="{{ asset('Assets/Logo.png') }}" alt="Logo" class="logo">
    </div>

    <!-- Título centralizado -->
    <h1 class="titulo">Bem-vindo ao Sistema</h1>

    <!-- Botões centralizados -->
    <div class="flex-grow-1 d-flex justify-content-center align-items-center">
        <div class="d-flex gap-4">
            <a href="{{ route('login') }}" class="btn btn-custom btn-entrar">Entrar</a>
            <a href="{{ route('register') }}" class="btn btn-custom btn-cadastrar">Cadastrar</a>
        </div>
    </div>

</body>
</html>
