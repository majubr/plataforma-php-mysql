
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
$query_qnt_avifauna = "SELECT COUNT(id) AS qnt_indiv FROM dw_avifauna";

if (!empty($dados_requisicao['search']['value']))  {
$query_qnt_avifauna .= " WHERE eventID LIKE :eventID";
$query_qnt_avifauna .= " OR samplingProtocol LIKE :samplingProtocol";
$query_qnt_avifauna .= " OR samplingEffort LIKE :samplingEffort ";
$query_qnt_avifauna .= " OR sampleSizeValue LIKE :sampleSizeValue ";
$query_qnt_avifauna .= " OR sampleSizeUnit LIKE :sampleSizeUnit ";
$query_qnt_avifauna .= " OR eventDate LIKE :eventDate ";
$query_qnt_avifauna .= " OR eventRemarks LIKE :eventRemarks ";
$query_qnt_avifauna .= " OR county LIKE :county ";
$query_qnt_avifauna .= " OR municipality LIKE :municipality ";
$query_qnt_avifauna .= " OR waterBody LIKE :waterBody ";
$query_qnt_avifauna .= " OR locality LIKE :locality ";
$query_qnt_avifauna .= " OR decimalLatitude LIKE :decimalLatitude ";
$query_qnt_avifauna .= " OR decimalLongitude LIKE :decimalLongitude ";
$query_qnt_avifauna .= " OR geodeticDatum LIKE :geodeticDatum ";

}
$result_qnt_avifauna = $conn->prepare($query_qnt_avifauna);


if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_qnt_avifauna->bindParam(':eventID', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':samplingProtocol', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':samplingEffort', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':sampleSizeValue', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':sampleSizeUnit', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':eventDate', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':eventRemarks', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':county', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':municipality', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':waterBody', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':locality', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':decimalLatitude', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':decimalLongitude', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':geodeticDatum', $valor_pesq, PDO::PARAM_STR);

}

//execute

$result_qnt_avifauna->execute();
$row_qnt_avifauna = $result_qnt_avifauna->fetch(PDO::FETCH_ASSOC);

//var_dump($row_qnt_avifauna);

//var_dump($row_qnt_avifauna);

//Recuperar os registros do banco de dados
$query_avifauna = "SELECT eventID, samplingProtocol, samplingEffort, sampleSizeValue, sampleSizeUnit, eventDate, eventRemarks, county, municipality, waterBody, locality, decimalLatitude, decimalLongitude, geodeticDatum
                    FROM dw_avifauna"; 

if (!empty($dados_requisicao['search']['value']))  {
$query_avifauna .= " WHERE eventID LIKE :eventID ";
$query_avifauna .= " OR samplingProtocol LIKE :samplingProtocol ";
$query_avifauna .= " OR samplingEffort LIKE :samplingEffort ";
$query_avifauna .= " OR sampleSizeValue LIKE :sampleSizeValue ";
$query_avifauna .= " OR sampleSizeUnit LIKE :sampleSizeUnit ";
$query_avifauna .= " OR eventDate LIKE :eventDate ";
$query_avifauna .= " OR eventRemarks LIKE :eventRemarks ";
$query_avifauna .= " OR county LIKE :county ";
$query_avifauna .= " OR municipality LIKE :municipality ";
$query_avifauna .= " OR waterBody LIKE :waterBody ";
$query_avifauna .= " OR locality LIKE :locality ";
$query_avifauna .= " OR decimalLatitude LIKE :decimalLatitude ";
$query_avifauna .= " OR decimalLongitude LIKE :decimalLongitude ";
$query_avifauna .= " OR geodeticDatum LIKE :geodeticDatum ";


}


//ordenar os registros  
$query_avifauna .= " ORDER BY " . $colunas[$dados_requisicao['order'][0]['column']] . " " . $dados_requisicao['order'][0]['dir'] . " LIMIT :inicio , :quantidade";                    
                   

//preparar a query
$result_avifauna = $conn->prepare($query_avifauna);
$result_avifauna = $conn ->prepare($query_avifauna);
$result_avifauna -> bindparam (":inicio",$dados_requisicao['start'], PDO::PARAM_INT);
$result_avifauna -> bindparam (":quantidade",$dados_requisicao['length'], PDO::PARAM_INT);

//utilizando os parametros query de pesquisa qdo valor é digitado no campo de pesquisa
if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_avifauna->bindParam(':eventID', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':samplingProtocol', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':samplingEffort', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':sampleSizeValue', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':sampleSizeUnit', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':eventDate', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':eventRemarks', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':county', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':municipality', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':waterBody', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':locality', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':decimalLatitude', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':decimalLongitude', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':geodeticDatum', $valor_pesq, PDO::PARAM_STR);

 
}


//executar a query
$result_avifauna->execute();


//var_dump($result_avifauna);

while($row_avifauna = $result_avifauna->fetch(PDO::FETCH_ASSOC)){
      extract($row_avifauna);
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
    "recordsTotal" => intval($row_qnt_avifauna['qnt_indiv']),
    "recordsFiltered" => intval ($row_qnt_avifauna['qnt_indiv']),
    "data" => $dados
];




echo json_encode($resultados);