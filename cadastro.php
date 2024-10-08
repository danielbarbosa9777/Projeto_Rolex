<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro</title>
</head>
<body>
    <h1>Resultado do processamento</h1>
    <main>
        <?php 
            include 'conexao.php';
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Recebe os dados do formulário
                $username = $_POST['username'];
                $senha = $_POST['senha'];
                $email = $_POST['email'];
                $last_name = $_POST['last_name'];
                $first_name = $_POST['first_name'];

                 // Verifica se o usuário já existe
                 $sql_check = "SELECT * FROM users WHERE username = ? OR email = ?";
                 $stmt_check = $mysqli->prepare($sql_check);
                 $stmt_check->bind_param("ss", $username, $email);
                 $stmt_check->execute();
                 $result = $stmt_check->get_result();
                 
                 if ($result->num_rows > 0) {
                     echo "Usuário ou e-mail já cadastrado!";
                     // Redireciona para outra página após 3 segundos
                    header("refresh:5;url=cadusuario.php");
                 } else {
                     // Hash da senha para segurança
                     $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
                 
                     // Prepara a query SQL para inserção
                     $sql = "INSERT INTO users (username, senha, email, primeiro_nome, ultimo_nome) VALUES (?, ?, ?, ?, ?)";
                 
                     // Preparar a consulta para evitar SQL Injection
                     $stmt = $mysqli->prepare($sql);
                     $stmt->bind_param("sssss", $username, $senha_hash, $email, $first_name, $last_name);
                 
                     // Executa a query e verifica se foi bem-sucedida
                     if ($stmt->execute()) {
                        echo "Novo registro criado com sucesso!";
                        $nome = $_POST["first_name"];
                        $senha = $_POST["senha"];
                        print "Olá $nome, sua senha é $senha";
                     } else {
                        echo "Erro: " . $sql . "<br>" . $mysqli->error;
                     }
                 
                     // Fecha a consulta
                     $stmt->close();
                 }
                 
                 // Fecha a consulta de verificação e a conexão
                 $stmt_check->close();
                 $mysqli->close();
             }
 
         ?>
         <p><a href="index.php">LOGIN</a></p>
     </main>
 </body>
 </html>