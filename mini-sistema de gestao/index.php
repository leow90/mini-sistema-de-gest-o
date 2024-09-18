<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema de Gestão de Produtos</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Bem-vindo ao Sistema de Gestão de Produtos</h1>

        <!-- Formulário de Login -->
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <form action="login.php" method="POST" class="border p-4 rounded bg-light">
                    <h2 class="text-center mb-4">Login</h2>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Entrar</button>
                </form>
                <p class="text-center mt-3">Não tem uma conta? <a href="register.php">Registre-se</a></p>
            </div>
        </div>
    </div>

    <!-- Rodapé (Footer) -->
    <footer class="text-center mt-5">
        <p>&copy; 2024 Sistema de Gestão de Produtos</p>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
