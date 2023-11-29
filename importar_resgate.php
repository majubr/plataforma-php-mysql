<?php include 'conexao.php'  ?>

<?php 


$arquivo = $_FILES["file"]["tmp_name"];
$nome = $_FILES["file"]["name"];

$ext = explode(".",$nome);

$extensao = end($ext);



if($extensao  != "csv"){

	

}else {
	$objeto = fopen($arquivo,'r');

	
	while (($dados = fgetcsv($objeto, 10000, ";")) !== FALSE){
	$projeto = $dados[0];
	$municipio = $dados[1];
	$ano = $dados[2];
	$datas = $dados[3];
	$estacao = $dados[4];
	$classe = $dados[5];
	$ordem = $dados[6];
	$familia = $dados[7];
	$genero = $dados[8];
	$especie = $dados[9];
	$nome_popular = $dados[10];
	$mg = $dados[11];
	$br = $dados[12];
	$iucn = $dados[13];
	$numero_ind = $dados[14];
	$regiao = $dados[15];
	$ponto_amostral = $dados[16];
	$metodologia = $dados[17];
	$latitude = $dados[18];
	$longitude = $dados[19];
	$campanha = $dados[20];
	$coletor = $dados[21];
	$especialidade = $dados[22];
	$empresa = $dados[23];
	$obs = $dados[24];

	$query = "INSERT INTO resgate (projeto, municipio, ano, datas, estacao, classe, ordem, familia, genero, especie, nome_popular, mg,br,iucn, numero_ind, regiao, ponto_amostral, metodologia, latitude, longitude,campanha, consultor, especialidade, empresa, obs) VALUES ('$projeto','$municipio', '$ano', '$datas','$estacao','$classe','$ordem','$familia','$genero','$especie' ,'$nome_popular','$mg', '$br', '$iucn', '$numero_ind','$regiao','$ponto_amostral','$metodologia','$latitude','$longitude','$campanha','$coletor','$especialidade','$empresa','$obs')";


    $stmt=$conn->prepare($query);
    $stmt->execute();


	}
	if($stmt){
		echo "Dados inseridos com sucesso";
	}else {
		echo "Erro ao inserir os dados";
	}
}

?>

<!DOCTYPE html>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<div  class = 'container' style="margin-top:40px">
<body>
	<h3>Arquivo inválido, favor selecionar arquivo no formato correto antes de clicar</h3> 
	<br>

        <a href="lista_sp_resgate.php" role="button" class = "btn btn-danger btn-lg"> Voltar para lista de espécies </a>
     
</body>
</div>
</html>

