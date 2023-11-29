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



    0 => 'eventID ',
    1 => 'occurrenceID',
    2 => 'basisOfRecord',
    3 => 'scientificName',
    4  => 'kingdon',
    5 => 'phylum',
    6 => 'class',
    7 => 'order_',
    8 => 'family',
    9 => 'taxonRank',
    10  => 'identificationQualifier',
    11 => 'recordedBy',
    12  => 'individualCount',
    13 => 'sex',
    14 => 'lifeStage',
    15 => 'reproductiveCondition',
    16 => 'preparations',
    17 => 'occurrenceRemarks',
];
   


// Obter a quantidade de registros no banco de dados
$query_qnt_mastofauna = "SELECT COUNT(id) AS qnt_indiv FROM dw_oc_mastofauna";
if (!empty($dados_requisicao['search']['value']))  {
$query_qnt_mastofauna .= " WHERE eventID  LIKE :eventID ";
$query_qnt_mastofauna .= " OR occurrenceID LIKE :occurrenceID";
$query_qnt_mastofauna .= " OR basisOfRecord LIKE :basisOfRecord ";
$query_qnt_mastofauna .= " OR scientificName LIKE :cientificName ";
$query_qnt_mastofauna .= " OR kingdon LIKE :kingdon ";
$query_qnt_mastofauna .= " OR phylum LIKE :phylum ";
$query_qnt_mastofauna .= " OR class LIKE :class ";
$query_qnt_mastofauna .= " OR order_ LIKE :order ";
$query_qnt_mastofauna .= " OR family LIKE :family ";
$query_qnt_mastofauna .= " OR taxonRank LIKE :taxonRank ";
$query_qnt_mastofauna .= " OR identificationQualifier LIKE :identificationQualifier ";
$query_qnt_mastofauna .= " OR recordedBy LIKE :recordedBy ";
$query_qnt_mastofauna .= " OR individualCount LIKE :individualCount ";
$query_qnt_mastofauna .= " OR sex LIKE :sex ";
$query_qnt_mastofauna .= " OR lifeStage LIKE :lifeStage ";
$query_qnt_mastofauna .= " OR reproductiveCondition LIKE :reproductiveCondition ";
$query_qnt_mastofauna .= " OR preparations LIKE :preparations ";
$query_qnt_mastofauna .= " OR occurrenceRemarks LIKE :occurrenceRemarks";

}
$result_qnt_mastofauna = $conn->prepare($query_qnt_mastofauna);


if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_qnt_mastofauna->bindParam(':eventID ', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':occurrenceID', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':basisOfRecord', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':scientificName', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':kingdon', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':phylum', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':class', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':order_', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':family', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':taxonRank', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':identificationQualifier', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':recordedBy', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':individualCount', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':sex', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':lifeStage', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':reproductiveCondition ', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':preparations  ', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':occurrenceRemarks', $valor_pesq, PDO::PARAM_STR);

}

//execute

$result_qnt_mastofauna->execute();
$row_qnt_mastofauna = $result_qnt_mastofauna->fetch(PDO::FETCH_ASSOC);

//var_dump($row_qnt_mastofauna);

//var_dump($row_qnt_mastofauna);

//Recuperar os registros do banco de dados
$query_mastofauna = "SELECT eventID , occurrenceID, basisOfRecord, scientificName, kingdon, phylum, class, order_, family, taxonRank,reproductiveCondition, identificationQualifier, recordedBy, individualCount, sex, lifeStage, reproductiveCondition , preparations  , occurrenceRemarks
                    FROM dw_oc_mastofauna"; 

if (!empty($dados_requisicao['search']['value']))  {
$query_mastofauna .= " WHERE eventID  LIKE :eventID  ";
$query_mastofauna .= " OR occurrenceID LIKE :occurrenceID ";
$query_mastofauna .= " OR basisOfRecord LIKE :basisOfRecord ";
$query_mastofauna .= " OR scientificName LIKE :scientificName ";
$query_mastofauna .= " OR kingdon LIKE :kingdon ";
$query_mastofauna .= " OR phylum LIKE :phylum ";
$query_mastofauna .= " OR class LIKE :class ";
$query_mastofauna .= " OR order_ LIKE :order ";
$query_mastofauna .= " OR family LIKE :family ";
$query_mastofauna .= " OR taxonRank LIKE :taxonRank ";
$query_mastofauna .= " OR identificationQualifier LIKE :identificationQualifier ";
$query_mastofauna .= " OR recordedBy LIKE :recordedBy ";
$query_mastofauna .= " OR individualCount LIKE :individualCount ";
$query_mastofauna .= " OR sex LIKE :sex ";
$query_mastofauna .= " OR lifeStage LIKE :lifeStage ";
$query_mastofauna .= " OR reproductiveCondition  LIKE :reproductiveCondition  ";
$query_mastofauna .= " OR preparations   LIKE :preparations   ";
$query_mastofauna .= " OR occurrenceRemarks LIKE :occurrenceRemarks ";

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
    $result_mastofauna->bindParam(':eventID ', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':occurrenceID', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':basisOfRecord', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':scientificName', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':kingdon', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':phylum', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':class', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':order_', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':family', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':taxonRank', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':identificationQualifier', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':recordedBy', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':individualCount', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':sex', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':lifeStage', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':reproductiveCondition ', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':preparations  ', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':occurrenceRemarks', $valor_pesq, PDO::PARAM_STR);
 
}


//executar a query
$result_mastofauna->execute();


//var_dump($result_mastofauna);

while($row_mastofauna = $result_mastofauna->fetch(PDO::FETCH_ASSOC)){
      extract($row_mastofauna);
    $registro = [];
    $registro [] = $eventID ;
    $registro [] = $occurrenceID;
    $registro [] = $basisOfRecord;
    $registro [] = $scientificName;
    $registro [] = $kingdon;
    $registro [] = $phylum;
    $registro [] = $class;
    $registro [] = $order_;
    $registro [] = $family;
    $registro [] = $taxonRank;
    $registro [] = $identificationQualifier;
    $registro [] = $recordedBy;
    $registro [] = $individualCount;
    $registro [] = $sex;
    $registro [] = $lifeStage;
    $registro [] = $reproductiveCondition ;
    $registro [] = $preparations  ;
    $registro [] = $occurrenceRemarks;
    $dados[] = $registro;


}

$resultados = [
    "draw" => intval ($dados_requisicao['draw']),
    "recordsTotal" => intval($row_qnt_mastofauna['qnt_indiv']),
    "recordsFiltered" => intval ($row_qnt_mastofauna['qnt_indiv']),
    "data" => $dados
];


echo json_encode($resultados); 
