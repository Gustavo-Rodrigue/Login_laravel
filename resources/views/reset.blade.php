<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Redefinir Conta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"> <!-- mesmo CSS das outras -->
</head>
<body class="min-vh-100 d-flex flex-column">

    <!-- Logo no topo -->
    <div class="p-3">
        <img src="{{ asset('Assets/Logo.png') }}" alt="Logo" class="logo">
    </div>

    <!-- Título -->
    <h1 class="titulo cadastro">Redefinir Conta</h1>

    <!-- Formulário centralizado -->
    <div class="flex-grow-1 d-flex justify-content-center align-items-center">
        <div class="login-form p-4">

            <!-- Erros -->
            @if($errors->any())
                <div class="alert alert-danger text-start">
                    <ul class="mb-0">
                        @foreach($errors->all() as $erro)
                            <li>{{ $erro }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <p class="text-center mb-4">Atualize seu e-mail e crie uma nova senha segura para acessar sua conta.</p>

            <!-- Form -->
            <form method="POST" action="{{ url('/reset') }}">
                @csrf
                <input type="hidden" name="email" value="{{ $email }}">

                <div class="mb-3">
                    <label class="form-label">Novo E-mail:</label>
                    <input type="email" name="new_email" class="form-control" value="{{ $email }}" required placeholder="Digite o novo e-mail">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nova Senha:</label>
                    <input type="password" name="password" class="form-control" minlength="4" required placeholder="Digite a nova senha">
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirmar Nova Senha:</label>
                    <input type="password" name="password_confirmation" class="form-control" minlength="4" required placeholder="Confirme a nova senha">
                </div>

                <button type="submit" class="btn btn-custom btn-entrar w-100">
                    Redefinir
                </button>
            </form>

            <!-- Voltar -->
            <div class="text-center mt-3">
                <a href="{{ route('login') }}" class="link-light">
                    <i class="bi bi-rewind-fill"></i> Voltar
                </a>
            </div>
        </div>
    </div>

</body>
</html>
