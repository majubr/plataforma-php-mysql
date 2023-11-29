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
$query_qnt_resgate = "SELECT COUNT(id) AS qnt_indiv FROM dw_resgate";

if (!empty($dados_requisicao['search']['value']))  {
$query_qnt_resgate .= " WHERE eventID LIKE :eventID";
$query_qnt_resgate .= " OR samplingProtocol LIKE :samplingProtocol";
$query_qnt_resgate .= " OR samplingEffort LIKE :samplingEffort ";
$query_qnt_resgate .= " OR sampleSizeValue LIKE :sampleSizeValue ";
$query_qnt_resgate .= " OR sampleSizeUnit LIKE :sampleSizeUnit ";
$query_qnt_resgate .= " OR eventDate LIKE :eventDate ";
$query_qnt_resgate .= " OR eventRemarks LIKE :eventRemarks ";
$query_qnt_resgate .= " OR county LIKE :county ";
$query_qnt_resgate .= " OR municipality LIKE :municipality ";
$query_qnt_resgate .= " OR waterBody LIKE :waterBody ";
$query_qnt_resgate .= " OR locality LIKE :locality ";
$query_qnt_resgate .= " OR decimalLatitude LIKE :decimalLatitude ";
$query_qnt_resgate .= " OR decimalLongitude LIKE :decimalLongitude ";
$query_qnt_resgate .= " OR geodeticDatum LIKE :geodeticDatum ";

}
$result_qnt_resgate = $conn->prepare($query_qnt_resgate);


if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_qnt_resgate->bindParam(':eventID', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':samplingProtocol', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':samplingEffort', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':sampleSizeValue', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':sampleSizeUnit', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':eventDate', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':eventRemarks', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':county', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':municipality', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':waterBody', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':locality', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':decimalLatitude', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':decimalLongitude', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':geodeticDatum', $valor_pesq, PDO::PARAM_STR);

}

//execute

$result_qnt_resgate->execute();
$row_qnt_resgate = $result_qnt_resgate->fetch(PDO::FETCH_ASSOC);

//var_dump($row_qnt_resgate);

//var_dump($row_qnt_resgate);

//Recuperar os registros do banco de dados
$query_resgate = "SELECT eventID, samplingProtocol, samplingEffort, sampleSizeValue, sampleSizeUnit, eventDate, eventRemarks, county, municipality, waterBody, locality, decimalLatitude, decimalLongitude, geodeticDatum
                    FROM dw_resgate"; 

if (!empty($dados_requisicao['search']['value']))  {
$query_resgate .= " WHERE eventID LIKE :eventID ";
$query_resgate .= " OR samplingProtocol LIKE :samplingProtocol ";
$query_resgate .= " OR samplingEffort LIKE :samplingEffort ";
$query_resgate .= " OR sampleSizeValue LIKE :sampleSizeValue ";
$query_resgate .= " OR sampleSizeUnit LIKE :sampleSizeUnit ";
$query_resgate .= " OR eventDate LIKE :eventDate ";
$query_resgate .= " OR eventRemarks LIKE :eventRemarks ";
$query_resgate .= " OR county LIKE :county ";
$query_resgate .= " OR municipality LIKE :municipality ";
$query_resgate .= " OR waterBody LIKE :waterBody ";
$query_resgate .= " OR locality LIKE :locality ";
$query_resgate .= " OR decimalLatitude LIKE :decimalLatitude ";
$query_resgate .= " OR decimalLongitude LIKE :decimalLongitude ";
$query_resgate .= " OR geodeticDatum LIKE :geodeticDatum ";


}


//ordenar os registros  
$query_resgate .= " ORDER BY " . $colunas[$dados_requisicao['order'][0]['column']] . " " . $dados_requisicao['order'][0]['dir'] . " LIMIT :inicio , :quantidade";                    
                   

//preparar a query
$result_resgate = $conn->prepare($query_resgate);
$result_resgate = $conn ->prepare($query_resgate);
$result_resgate -> bindparam (":inicio",$dados_requisicao['start'], PDO::PARAM_INT);
$result_resgate -> bindparam (":quantidade",$dados_requisicao['length'], PDO::PARAM_INT);

//utilizando os parametros query de pesquisa qdo valor é digitado no campo de pesquisa
if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_resgate->bindParam(':eventID', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':samplingProtocol', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':samplingEffort', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':sampleSizeValue', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':sampleSizeUnit', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':eventDate', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':eventRemarks', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':county', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':municipality', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':waterBody', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':locality', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':decimalLatitude', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':decimalLongitude', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':geodeticDatum', $valor_pesq, PDO::PARAM_STR);

 
}


//executar a query
$result_resgate->execute();


//var_dump($result_resgate);

while($row_resgate = $result_resgate->fetch(PDO::FETCH_ASSOC)){
      extract($row_resgate);
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
    "recordsTotal" => intval($row_qnt_resgate['qnt_indiv']),
    "recordsFiltered" => intval ($row_qnt_resgate['qnt_indiv']),
    "data" => $dados
];




echo json_encode($resultados);