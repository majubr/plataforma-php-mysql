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
	$eventID = $dados[0];
	$occurrenceID = $dados[1];
	$basisOfRecord = $dados[2];
	$scientificName = $dados[3];
	$kingdon = $dados[4];
	$phylum = $dados[5];
	$class = $dados[6];
	$order_ = $dados[7];
	$family = $dados[8];
	$taxonRank = $dados[9];
	$identificationQualifier = $dados[10];
	$recordedBy = $dados[11];
	$individualCount = $dados[12];
	$sex = $dados[13];
	$lifeStage = $dados[14];
	$reproductiveCondition = $dados[15];
	$preparations = $dados[16];
	$occurrenceRemarks = $dados[17];


	$query = "INSERT INTO dw_avifauna (eventID, occurrenceID, basisOfRecord, scientificName, kingdon, phylum, class, order_, family, taxonRank, identificationQualifier, recordedBy, individualCount, sex, lifeStage, reproductiveCondition, preparations, occurrenceRemarks) VALUES ('$eventID','$occurrenceID','$basisOfRecord','$scientificName','$kingdon','$phylum','$class','$order_','$family','$taxonRank','$identificationQualifier','$recordedBy','$individualCount','$sex','$lifeStage','$reproductiveCondition','$preparations','$occurrenceRemarks')";


    $stmt=$conn->prepare($query);
    $stmt->execute();


	}
	if($stmt){
		echo "Dados inseridos com sucesso";
	}else {
		echo "Erro ao inserir os dados";

?>
<!DOCTYPE html>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<div  class = 'container' style="margin-top:40px">
<body>
	<h3>Arquivo inválido, favor selecionar arquivo no formato correto antes de clicar</h3> 
	<br>

        <a href="manipulacao_avi.php" role="button" class = "btn btn-danger btn-lg"> Voltar para manipulação de tabelas </a>
     
</body>
</div>
</html>
<?php
	}
}

?>