<?php

try {
    //Conexão com a porta
    //$conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);
    $host = "l6glqt8gsx37y4hs.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    $user = "bgincnwg9tteblot";
    $pass = "epk1dmdv78po6oo1";
    $dbname = "tev9wa2lrbj9xb5v";
    $port = 3306;
    
    
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    //Conexão sem a porta
    
    //echo "Conexão com banco de dados realizado com sucesso.";
} catch (PDOException $err) {
    //echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado " . $err->getMessage();
}
?>



