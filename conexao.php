    <?php 
        $hostname = "localhost";
        $bancodedados = "site";
        $usuario = "root";
        $senha = "";

        $mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
        if($mysqli->connect_errno)
            print"Falha ao conectar";
        
    ?>
   
    
    

