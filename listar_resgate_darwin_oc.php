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
$query_qnt_resgate = "SELECT COUNT(id) AS qnt_indiv FROM dw_oc_resgate";
if (!empty($dados_requisicao['search']['value']))  {
$query_qnt_resgate .= " WHERE eventID  LIKE :eventID ";
$query_qnt_resgate .= " OR occurrenceID LIKE :occurrenceID";
$query_qnt_resgate .= " OR basisOfRecord LIKE :basisOfRecord ";
$query_qnt_resgate .= " OR scientificName LIKE :cientificName ";
$query_qnt_resgate .= " OR kingdon LIKE :kingdon ";
$query_qnt_resgate .= " OR phylum LIKE :phylum ";
$query_qnt_resgate .= " OR class LIKE :class ";
$query_qnt_resgate .= " OR order_ LIKE :order ";
$query_qnt_resgate .= " OR family LIKE :family ";
$query_qnt_resgate .= " OR taxonRank LIKE :taxonRank ";
$query_qnt_resgate .= " OR identificationQualifier LIKE :identificationQualifier ";
$query_qnt_resgate .= " OR recordedBy LIKE :recordedBy ";
$query_qnt_resgate .= " OR individualCount LIKE :individualCount ";
$query_qnt_resgate .= " OR sex LIKE :sex ";
$query_qnt_resgate .= " OR lifeStage LIKE :lifeStage ";
$query_qnt_resgate .= " OR reproductiveCondition LIKE :reproductiveCondition ";
$query_qnt_resgate .= " OR preparations LIKE :preparations ";
$query_qnt_resgate .= " OR occurrenceRemarks LIKE :occurrenceRemarks";

}
$result_qnt_resgate = $conn->prepare($query_qnt_resgate);


if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_qnt_resgate->bindParam(':eventID ', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':occurrenceID', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':basisOfRecord', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':scientificName', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':kingdon', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':phylum', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':class', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':order_', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':family', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':taxonRank', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':identificationQualifier', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':recordedBy', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':individualCount', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':sex', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':lifeStage', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':reproductiveCondition ', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':preparations  ', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':occurrenceRemarks', $valor_pesq, PDO::PARAM_STR);

}

//execute

$result_qnt_resgate->execute();
$row_qnt_resgate = $result_qnt_resgate->fetch(PDO::FETCH_ASSOC);

//var_dump($row_qnt_resgate);

//var_dump($row_qnt_resgate);

//Recuperar os registros do banco de dados
$query_resgate = "SELECT eventID , occurrenceID, basisOfRecord, scientificName, kingdon, phylum, class, order_, family, taxonRank,reproductiveCondition, identificationQualifier, recordedBy, individualCount, sex, lifeStage, reproductiveCondition , preparations  , occurrenceRemarks
                    FROM dw_oc_resgate"; 

if (!empty($dados_requisicao['search']['value']))  {
$query_resgate .= " WHERE eventID  LIKE :eventID  ";
$query_resgate .= " OR occurrenceID LIKE :occurrenceID ";
$query_resgate .= " OR basisOfRecord LIKE :basisOfRecord ";
$query_resgate .= " OR scientificName LIKE :scientificName ";
$query_resgate .= " OR kingdon LIKE :kingdon ";
$query_resgate .= " OR phylum LIKE :phylum ";
$query_resgate .= " OR class LIKE :class ";
$query_resgate .= " OR order_ LIKE :order ";
$query_resgate .= " OR family LIKE :family ";
$query_resgate .= " OR taxonRank LIKE :taxonRank ";
$query_resgate .= " OR identificationQualifier LIKE :identificationQualifier ";
$query_resgate .= " OR recordedBy LIKE :recordedBy ";
$query_resgate .= " OR individualCount LIKE :individualCount ";
$query_resgate .= " OR sex LIKE :sex ";
$query_resgate .= " OR lifeStage LIKE :lifeStage ";
$query_resgate .= " OR reproductiveCondition  LIKE :reproductiveCondition  ";
$query_resgate .= " OR preparations   LIKE :preparations   ";
$query_resgate .= " OR occurrenceRemarks LIKE :occurrenceRemarks ";

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
    $result_resgate->bindParam(':eventID ', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':occurrenceID', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':basisOfRecord', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':scientificName', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':kingdon', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':phylum', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':class', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':order_', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':family', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':taxonRank', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':identificationQualifier', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':recordedBy', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':individualCount', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':sex', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':lifeStage', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':reproductiveCondition ', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':preparations  ', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':occurrenceRemarks', $valor_pesq, PDO::PARAM_STR);
 
}


//executar a query
$result_resgate->execute();


//var_dump($result_resgate);

while($row_resgate = $result_resgate->fetch(PDO::FETCH_ASSOC)){
      extract($row_resgate);
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
    "recordsTotal" => intval($row_qnt_resgate['qnt_indiv']),
    "recordsFiltered" => intval ($row_qnt_resgate['qnt_indiv']),
    "data" => $dados
];


echo json_encode($resultados); 
