
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
$query_qnt_herpetofauna = "SELECT COUNT(id) AS qnt_indiv FROM dw_herpetofauna";

if (!empty($dados_requisicao['search']['value']))  {
$query_qnt_herpetofauna .= " WHERE eventID LIKE :eventID";
$query_qnt_herpetofauna .= " OR samplingProtocol LIKE :samplingProtocol";
$query_qnt_herpetofauna .= " OR samplingEffort LIKE :samplingEffort ";
$query_qnt_herpetofauna .= " OR sampleSizeValue LIKE :sampleSizeValue ";
$query_qnt_herpetofauna .= " OR sampleSizeUnit LIKE :sampleSizeUnit ";
$query_qnt_herpetofauna .= " OR eventDate LIKE :eventDate ";
$query_qnt_herpetofauna .= " OR eventRemarks LIKE :eventRemarks ";
$query_qnt_herpetofauna .= " OR county LIKE :county ";
$query_qnt_herpetofauna .= " OR municipality LIKE :municipality ";
$query_qnt_herpetofauna .= " OR waterBody LIKE :waterBody ";
$query_qnt_herpetofauna .= " OR locality LIKE :locality ";
$query_qnt_herpetofauna .= " OR decimalLatitude LIKE :decimalLatitude ";
$query_qnt_herpetofauna .= " OR decimalLongitude LIKE :decimalLongitude ";
$query_qnt_herpetofauna .= " OR geodeticDatum LIKE :geodeticDatum ";

}
$result_qnt_herpetofauna = $conn->prepare($query_qnt_herpetofauna);


if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_qnt_herpetofauna->bindParam(':eventID', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':samplingProtocol', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':samplingEffort', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':sampleSizeValue', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':sampleSizeUnit', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':eventDate', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':eventRemarks', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':county', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':municipality', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':waterBody', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':locality', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':decimalLatitude', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':decimalLongitude', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':geodeticDatum', $valor_pesq, PDO::PARAM_STR);

}

//execute

$result_qnt_herpetofauna->execute();
$row_qnt_herpetofauna = $result_qnt_herpetofauna->fetch(PDO::FETCH_ASSOC);

//var_dump($row_qnt_herpetofauna);

//var_dump($row_qnt_herpetofauna);

//Recuperar os registros do banco de dados
$query_herpetofauna = "SELECT eventID, samplingProtocol, samplingEffort, sampleSizeValue, sampleSizeUnit, eventDate, eventRemarks, county, municipality, waterBody, locality, decimalLatitude, decimalLongitude, geodeticDatum
                    FROM dw_herpetofauna"; 

if (!empty($dados_requisicao['search']['value']))  {
$query_herpetofauna .= " WHERE eventID LIKE :eventID ";
$query_herpetofauna .= " OR samplingProtocol LIKE :samplingProtocol ";
$query_herpetofauna .= " OR samplingEffort LIKE :samplingEffort ";
$query_herpetofauna .= " OR sampleSizeValue LIKE :sampleSizeValue ";
$query_herpetofauna .= " OR sampleSizeUnit LIKE :sampleSizeUnit ";
$query_herpetofauna .= " OR eventDate LIKE :eventDate ";
$query_herpetofauna .= " OR eventRemarks LIKE :eventRemarks ";
$query_herpetofauna .= " OR county LIKE :county ";
$query_herpetofauna .= " OR municipality LIKE :municipality ";
$query_herpetofauna .= " OR waterBody LIKE :waterBody ";
$query_herpetofauna .= " OR locality LIKE :locality ";
$query_herpetofauna .= " OR decimalLatitude LIKE :decimalLatitude ";
$query_herpetofauna .= " OR decimalLongitude LIKE :decimalLongitude ";
$query_herpetofauna .= " OR geodeticDatum LIKE :geodeticDatum ";


}


//ordenar os registros  
$query_herpetofauna .= " ORDER BY " . $colunas[$dados_requisicao['order'][0]['column']] . " " . $dados_requisicao['order'][0]['dir'] . " LIMIT :inicio , :quantidade";                    
                   

//preparar a query
$result_herpetofauna = $conn->prepare($query_herpetofauna);
$result_herpetofauna = $conn ->prepare($query_herpetofauna);
$result_herpetofauna -> bindparam (":inicio",$dados_requisicao['start'], PDO::PARAM_INT);
$result_herpetofauna -> bindparam (":quantidade",$dados_requisicao['length'], PDO::PARAM_INT);

//utilizando os parametros query de pesquisa qdo valor é digitado no campo de pesquisa
if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_herpetofauna->bindParam(':eventID', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':samplingProtocol', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':samplingEffort', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':sampleSizeValue', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':sampleSizeUnit', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':eventDate', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':eventRemarks', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':county', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':municipality', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':waterBody', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':locality', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':decimalLatitude', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':decimalLongitude', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':geodeticDatum', $valor_pesq, PDO::PARAM_STR);

 
}


//executar a query
$result_herpetofauna->execute();


//var_dump($result_herpetofauna);

while($row_herpetofauna = $result_herpetofauna->fetch(PDO::FETCH_ASSOC)){
      extract($row_herpetofauna);
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
    "recordsTotal" => intval($row_qnt_herpetofauna['qnt_indiv']),
    "recordsFiltered" => intval ($row_qnt_herpetofauna['qnt_indiv']),
    "data" => $dados
];




echo json_encode($resultados);