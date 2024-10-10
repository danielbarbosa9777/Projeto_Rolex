<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>cadastro_de_usuario</title>
</head>
<body>
    <h1>Cadastro de Usuário</h1>
    <div class="form-container">
        <form action="cadastro.php" method="POST">
           <!--USERNAME -->
            <div class="form-group">
                <label for="username">Nome de usuário:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <!--senha-->
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <!--Confirme Password -->
            <div class="form-group">
                <label for="confirm-password">Confirme a Senha:</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
            </div>
            <!--Email -->
            <div class="form-group">
                <label for="email">Escreva seu e-mail:</label>
                <input type="email" id="email" name="email" requeried>
            </div>
            <!--First_Name -->
            <div class="form-group">
                <label for="first_name">Escreva seu primeiro nome:</label>
                <input type="text" id="first_name" name="first_name">
            </div>
            <!--Last_Name -->
            <div class="form-group">
                <label for="last_name">Escreva seu primeiro nome:</label>
                <input type="text" id="last_name" name="last_name">
            </div>

            <div class="form-group">
                <button type="submit">Cadastrar</button>
            </div>
        </form>
    </div>
    <h2>Caso já seja cliente favor fazer login no sistema clicando <a href="index.php">aqui</a></h2>
    <div class="data-hora">
        <?php include 'rodape.php'
        ?>
    </div>
</body>
</html>