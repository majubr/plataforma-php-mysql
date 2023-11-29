<?php
include 'conexao.php';
include 'script/password.php';

$nomeusuario = $_POST['nomeusuario'];
$mail = $_POST['mailusuario'];
$senha = $_POST['senhausuario'];
//$nivel = $_POST['nivelusuario'];
$status = "Inativo";

$sql = "INSERT INTO usuarios (nome_usuario, mail_usuario,senha_usuario,status)  VALUES ('$nomeusuario','$mail',sha1('$senha'), '$status' )";


			
$conn->query($sql);



?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <div class="container" style="width:400px">
    	<center>
    		<h3>Adicionado com sucesso, esperando aprovação</h3>
    		<div style = "margin-top: 10px;">
    			<a href="index.php" class = "btn btn-sm btn-warning" style="color:#fff">Voltar</a>
    		</div>
    	</center>
    	
    </div>