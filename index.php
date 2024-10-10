<?php 
include('conexao.php');

if(isset($_POST['username']) || isset($_POST['senha'])){
    if(strlen($_POST['username'])==0){
        print "Preencha seu nome de usuário";
    } 
    else if(strlen($_POST['senha'])==0){
        print "Preencha sua senha";
    }
    else {
        $username = $mysqli->real_escape_string($_POST['username']);
        $senha = $mysqli->real_escape_string($_POST['senha']);
        $sql_code = "SELECT * FROM users WHERE username = '$username' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL" . $mysqli->error);

        $quantidade = $sql_query->num_rows;
        if($quantidade == 1){
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)){
                session_start();
            }
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['username'] = $usuario['username'];
            $_SESSION['ultimo_nome'] = $usuario['ultimo_nome'];
            header("Location: painel.php");
        } else{
            print '<p class="texto-vermelho">Email ou senha incorretos!</p>';
            
        }



    }
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <h1>Acesso a conta</h1>
    <div class="form-container">
        <form action="" method="POST">
           <!--USERNAME -->
            <div class="form-group">
                <label for="username">Nome de usuário:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <!--Password -->
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            
            <div class="form-group">
                <button type="submit">Entrar</button>
            </div>
        </form>
    </div>
    <p>Caso não tenha login clique <a href="cadusuario.php">aqui</a> para criar</p>
    <div class="data-hora">
        <?php include 'rodape.php'
        ?>
    </div>


    
</body>
</html>