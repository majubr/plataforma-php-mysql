<?php

// Incluir a conexao com o banco de dados




    //Conexão com a porta
    //$conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);

    //Conexão sem a porta
    $conn = new mysqli("localhost", "root", "", "fauna");

    $sql = "SELECT distinct(classe) as total_class FROM herpetofauna"; 
    $busca = mysqli_query($conn,$sql);
    while ($array =  mysqli_fetch_array($busca)){

        $total_class = $array['total_class'];
        echo $total_class;
    }
    
    ?>