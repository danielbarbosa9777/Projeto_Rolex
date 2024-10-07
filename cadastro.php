<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>c</title>
</head>
<body>
    <h1>Resultado do processamento</h1>
    <main>
        <?php 
            include 'conexao.php';
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Recebe os dados do formulário
                $username = $_POST['username'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                $last_name = $_POST['last_name'];
                $first_name = $_POST['first_name'];
            
                // Hash da senha para segurança
                $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
            
                // Prepara a query SQL para inserção
                $sql = "INSERT INTO users (username, senha, email, primeiro_nome, ultimo_nome) VALUES (?, ?, ?, ?, ?)";
            
                // Preparar a consulta para evitar SQL Injection
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("sssss", $username, $email, $senha, $first_name, $last_name);
            
                // Executa a query e verifica se foi bem-sucedida
                if ($stmt->execute()) {
                    echo "Novo registro criado com sucesso!";
                } else {
                    echo "Erro: " . $sql . "<br>" . $conn->error;
                }
            
                // Fecha a consulta e a conexão
                $stmt->close();
                $mysqli->close();
            }

            $nome = $_POST["first_name"] ;
            $senha = $_POST["senha"];
            print "Olá $nome sua senha é $senha"
        ?>
        <p><a href="index.php">LOGIN</a></p>
    </main>
    

</body>
</html>