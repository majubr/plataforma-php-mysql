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
$query_qnt_ictiofauna = "SELECT COUNT(id) AS qnt_indiv FROM dw_ictiofauna";

if (!empty($dados_requisicao['search']['value']))  {
$query_qnt_ictiofauna .= " WHERE eventID LIKE :eventID";
$query_qnt_ictiofauna .= " OR samplingProtocol LIKE :samplingProtocol";
$query_qnt_ictiofauna .= " OR samplingEffort LIKE :samplingEffort ";
$query_qnt_ictiofauna .= " OR sampleSizeValue LIKE :sampleSizeValue ";
$query_qnt_ictiofauna .= " OR sampleSizeUnit LIKE :sampleSizeUnit ";
$query_qnt_ictiofauna .= " OR eventDate LIKE :eventDate ";
$query_qnt_ictiofauna .= " OR eventRemarks LIKE :eventRemarks ";
$query_qnt_ictiofauna .= " OR county LIKE :county ";
$query_qnt_ictiofauna .= " OR municipality LIKE :municipality ";
$query_qnt_ictiofauna .= " OR waterBody LIKE :waterBody ";
$query_qnt_ictiofauna .= " OR locality LIKE :locality ";
$query_qnt_ictiofauna .= " OR decimalLatitude LIKE :decimalLatitude ";
$query_qnt_ictiofauna .= " OR decimalLongitude LIKE :decimalLongitude ";
$query_qnt_ictiofauna .= " OR geodeticDatum LIKE :geodeticDatum ";

}
$result_qnt_ictiofauna = $conn->prepare($query_qnt_ictiofauna);


if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_qnt_ictiofauna->bindParam(':eventID', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':samplingProtocol', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':samplingEffort', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':sampleSizeValue', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':sampleSizeUnit', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':eventDate', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':eventRemarks', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':county', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':municipality', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':waterBody', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':locality', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':decimalLatitude', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':decimalLongitude', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':geodeticDatum', $valor_pesq, PDO::PARAM_STR);

}

//execute

$result_qnt_ictiofauna->execute();
$row_qnt_ictiofauna = $result_qnt_ictiofauna->fetch(PDO::FETCH_ASSOC);

//var_dump($row_qnt_ictiofauna);

//var_dump($row_qnt_ictiofauna);

//Recuperar os registros do banco de dados
$query_ictiofauna = "SELECT eventID, samplingProtocol, samplingEffort, sampleSizeValue, sampleSizeUnit, eventDate, eventRemarks, county, municipality, waterBody, locality, decimalLatitude, decimalLongitude, geodeticDatum
                    FROM dw_ictiofauna"; 

if (!empty($dados_requisicao['search']['value']))  {
$query_ictiofauna .= " WHERE eventID LIKE :eventID ";
$query_ictiofauna .= " OR samplingProtocol LIKE :samplingProtocol ";
$query_ictiofauna .= " OR samplingEffort LIKE :samplingEffort ";
$query_ictiofauna .= " OR sampleSizeValue LIKE :sampleSizeValue ";
$query_ictiofauna .= " OR sampleSizeUnit LIKE :sampleSizeUnit ";
$query_ictiofauna .= " OR eventDate LIKE :eventDate ";
$query_ictiofauna .= " OR eventRemarks LIKE :eventRemarks ";
$query_ictiofauna .= " OR county LIKE :county ";
$query_ictiofauna .= " OR municipality LIKE :municipality ";
$query_ictiofauna .= " OR waterBody LIKE :waterBody ";
$query_ictiofauna .= " OR locality LIKE :locality ";
$query_ictiofauna .= " OR decimalLatitude LIKE :decimalLatitude ";
$query_ictiofauna .= " OR decimalLongitude LIKE :decimalLongitude ";
$query_ictiofauna .= " OR geodeticDatum LIKE :geodeticDatum ";


}


//ordenar os registros  
$query_ictiofauna .= " ORDER BY " . $colunas[$dados_requisicao['order'][0]['column']] . " " . $dados_requisicao['order'][0]['dir'] . " LIMIT :inicio , :quantidade";                    
                   

//preparar a query
$result_ictiofauna = $conn->prepare($query_ictiofauna);
$result_ictiofauna = $conn ->prepare($query_ictiofauna);
$result_ictiofauna -> bindparam (":inicio",$dados_requisicao['start'], PDO::PARAM_INT);
$result_ictiofauna -> bindparam (":quantidade",$dados_requisicao['length'], PDO::PARAM_INT);

//utilizando os parametros query de pesquisa qdo valor é digitado no campo de pesquisa
if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_ictiofauna->bindParam(':eventID', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':samplingProtocol', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':samplingEffort', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':sampleSizeValue', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':sampleSizeUnit', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':eventDate', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':eventRemarks', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':county', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':municipality', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':waterBody', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':locality', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':decimalLatitude', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':decimalLongitude', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':geodeticDatum', $valor_pesq, PDO::PARAM_STR);

 
}


//executar a query
$result_ictiofauna->execute();


//var_dump($result_ictiofauna);

while($row_ictiofauna = $result_ictiofauna->fetch(PDO::FETCH_ASSOC)){
      extract($row_ictiofauna);
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
    "recordsTotal" => intval($row_qnt_ictiofauna['qnt_indiv']),
    "recordsFiltered" => intval ($row_qnt_ictiofauna['qnt_indiv']),
    "data" => $dados
];




echo json_encode($resultados); 
