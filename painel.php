<?php 
if(!isset($_SESSION)){
    session_start();
}

include 'protect.php'
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Painel_Principal</title>
</head>
<body>
    <h1>Página principal</h1>
    <p>Bem vindo <?php echo $_SESSION['username']?> !</p>
    <p>Ou para os mais conhecidos apenas <?php echo $_SESSION['ultimo_nome']?></p>

    <p><a href="logout.php">SAIR</a></p>
    <div class="data-hora">
        <?php include 'rodape.php'
        ?>
    </div>     
</body>
</html>