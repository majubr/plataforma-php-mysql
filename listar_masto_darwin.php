<?php include 'conexao.php' ?>


<?php

// Incluir a conexao com o banco de dados



    //Conexão com a porta
    //$conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);

    //Conexão sem a porta




//Receber os dados da requisão
$dados_requisicao = $_REQUEST;

//lista de colunas na tabela


$colunas = [


    0 => 'eventID',
    1 => 'samplingProtocol',
    2 => 'samplingEffort',
    3  => 'sampleSizeValue',
    4  => 'sampleSizeUnit',
    5 => 'eventDate',
    6 => 'eventRemarks',
    7 => 'county',
    8 => 'municipality',
    9 => 'waterBody',
    10 => 'locality',
    11  => 'decimalLatitude',
    12 => 'decimalLongitude',
    13  => 'geodeticDatum',

];





// Obter a quantidade de registros no banco de dados
$query_qnt_mastofauna = "SELECT COUNT(id) AS qnt_indiv FROM dw_mastofauna";

if (!empty($dados_requisicao['search']['value']))  {
$query_qnt_mastofauna .= " WHERE eventID LIKE :eventID";
$query_qnt_mastofauna .= " OR samplingProtocol LIKE :samplingProtocol";
$query_qnt_mastofauna .= " OR samplingEffort LIKE :samplingEffort ";
$query_qnt_mastofauna .= " OR sampleSizeValue LIKE :sampleSizeValue ";
$query_qnt_mastofauna .= " OR sampleSizeUnit LIKE :sampleSizeUnit ";
$query_qnt_mastofauna .= " OR eventDate LIKE :eventDate ";
$query_qnt_mastofauna .= " OR eventRemarks LIKE :eventRemarks ";
$query_qnt_mastofauna .= " OR county LIKE :county ";
$query_qnt_mastofauna .= " OR municipality LIKE :municipality ";
$query_qnt_mastofauna .= " OR waterBody LIKE :waterBody ";
$query_qnt_mastofauna .= " OR locality LIKE :locality ";
$query_qnt_mastofauna .= " OR decimalLatitude LIKE :decimalLatitude ";
$query_qnt_mastofauna .= " OR decimalLongitude LIKE :decimalLongitude ";
$query_qnt_mastofauna .= " OR geodeticDatum LIKE :geodeticDatum ";

}
$result_qnt_mastofauna = $conn->prepare($query_qnt_mastofauna);


if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_qnt_mastofauna->bindParam(':eventID', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':samplingProtocol', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':samplingEffort', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':sampleSizeValue', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':sampleSizeUnit', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':eventDate', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':eventRemarks', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':county', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':municipality', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':waterBody', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':locality', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':decimalLatitude', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':decimalLongitude', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':geodeticDatum', $valor_pesq, PDO::PARAM_STR);

}

//execute

$result_qnt_mastofauna->execute();
$row_qnt_mastofauna = $result_qnt_mastofauna->fetch(PDO::FETCH_ASSOC);

//var_dump($row_qnt_mastofauna);

//var_dump($row_qnt_mastofauna);

//Recuperar os registros do banco de dados
$query_mastofauna = "SELECT eventID, samplingProtocol, samplingEffort, sampleSizeValue, sampleSizeUnit, eventDate, eventRemarks, county, municipality, waterBody, locality, decimalLatitude, decimalLongitude, geodeticDatum
                    FROM dw_mastofauna"; 

if (!empty($dados_requisicao['search']['value']))  {
$query_mastofauna .= " WHERE eventID LIKE :eventID ";
$query_mastofauna .= " OR samplingProtocol LIKE :samplingProtocol ";
$query_mastofauna .= " OR samplingEffort LIKE :samplingEffort ";
$query_mastofauna .= " OR sampleSizeValue LIKE :sampleSizeValue ";
$query_mastofauna .= " OR sampleSizeUnit LIKE :sampleSizeUnit ";
$query_mastofauna .= " OR eventDate LIKE :eventDate ";
$query_mastofauna .= " OR eventRemarks LIKE :eventRemarks ";
$query_mastofauna .= " OR county LIKE :county ";
$query_mastofauna .= " OR municipality LIKE :municipality ";
$query_mastofauna .= " OR waterBody LIKE :waterBody ";
$query_mastofauna .= " OR locality LIKE :locality ";
$query_mastofauna .= " OR decimalLatitude LIKE :decimalLatitude ";
$query_mastofauna .= " OR decimalLongitude LIKE :decimalLongitude ";
$query_mastofauna .= " OR geodeticDatum LIKE :geodeticDatum ";


}


//ordenar os registros  
$query_mastofauna .= " ORDER BY " . $colunas[$dados_requisicao['order'][0]['column']] . " " . $dados_requisicao['order'][0]['dir'] . " LIMIT :inicio , :quantidade";                    
                   

//preparar a query
$result_mastofauna = $conn->prepare($query_mastofauna);
$result_mastofauna = $conn ->prepare($query_mastofauna);
$result_mastofauna -> bindparam (":inicio",$dados_requisicao['start'], PDO::PARAM_INT);
$result_mastofauna -> bindparam (":quantidade",$dados_requisicao['length'], PDO::PARAM_INT);

//utilizando os parametros query de pesquisa qdo valor é digitado no campo de pesquisa
if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_mastofauna->bindParam(':eventID', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':samplingProtocol', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':samplingEffort', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':sampleSizeValue', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':sampleSizeUnit', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':eventDate', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':eventRemarks', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':county', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':municipality', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':waterBody', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':locality', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':decimalLatitude', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':decimalLongitude', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':geodeticDatum', $valor_pesq, PDO::PARAM_STR);

 
}


//executar a query
$result_mastofauna->execute();


//var_dump($result_mastofauna);

while($row_mastofauna = $result_mastofauna->fetch(PDO::FETCH_ASSOC)){
      extract($row_mastofauna);
    $registro = [];
    $registro [] = $eventID;
    $registro [] = $samplingProtocol;
    $registro [] = $samplingEffort;
    $registro [] = $sampleSizeValue;
    $registro [] = $sampleSizeUnit;
    $registro [] = $eventDate;
    $registro [] = $eventRemarks;
    $registro [] = $county;
    $registro [] = $municipality;
    $registro [] = $waterBody;
    $registro [] = $locality;
    $registro [] = $decimalLatitude;
    $registro [] = $decimalLongitude;
    $registro [] = $geodeticDatum;
    $dados[] = $registro;


}

$resultados = [
    "draw" => intval ($dados_requisicao['draw']),
    "recordsTotal" => intval($row_qnt_mastofauna['qnt_indiv']),
    "recordsFiltered" => intval ($row_qnt_mastofauna['qnt_indiv']),
    "data" => $dados
];




echo json_encode($resultados);