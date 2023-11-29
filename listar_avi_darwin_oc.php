<?php include 'conexao.php' ?>

<?php

// Incluir a conexao com o banco de dados




    //Conexão com a porta
    //$conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);

    //Conexão sem a porta
    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);





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
$query_qnt_avifauna = "SELECT COUNT(id) AS qnt_indiv FROM dw_oc_avifauna";
if (!empty($dados_requisicao['search']['value']))  {
$query_qnt_avifauna .= " WHERE eventID  LIKE :eventID ";
$query_qnt_avifauna .= " OR occurrenceID LIKE :occurrenceID";
$query_qnt_avifauna .= " OR basisOfRecord LIKE :basisOfRecord ";
$query_qnt_avifauna .= " OR scientificName LIKE :cientificName ";
$query_qnt_avifauna .= " OR kingdon LIKE :kingdon ";
$query_qnt_avifauna .= " OR phylum LIKE :phylum ";
$query_qnt_avifauna .= " OR class LIKE :class ";
$query_qnt_avifauna .= " OR order_ LIKE :order ";
$query_qnt_avifauna .= " OR family LIKE :family ";
$query_qnt_avifauna .= " OR taxonRank LIKE :taxonRank ";
$query_qnt_avifauna .= " OR identificationQualifier LIKE :identificationQualifier ";
$query_qnt_avifauna .= " OR recordedBy LIKE :recordedBy ";
$query_qnt_avifauna .= " OR individualCount LIKE :individualCount ";
$query_qnt_avifauna .= " OR sex LIKE :sex ";
$query_qnt_avifauna .= " OR lifeStage LIKE :lifeStage ";
$query_qnt_avifauna .= " OR reproductiveCondition LIKE :reproductiveCondition ";
$query_qnt_avifauna .= " OR preparations LIKE :preparations ";
$query_qnt_avifauna .= " OR occurrenceRemarks LIKE :occurrenceRemarks";

}
$result_qnt_avifauna = $conn->prepare($query_qnt_avifauna);


if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_qnt_avifauna->bindParam(':eventID ', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':occurrenceID', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':basisOfRecord', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':scientificName', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':kingdon', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':phylum', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':class', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':order_', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':family', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':taxonRank', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':identificationQualifier', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':recordedBy', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':individualCount', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':sex', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':lifeStage', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':reproductiveCondition ', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':preparations  ', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':occurrenceRemarks', $valor_pesq, PDO::PARAM_STR);

}

//execute

$result_qnt_avifauna->execute();
$row_qnt_avifauna = $result_qnt_avifauna->fetch(PDO::FETCH_ASSOC);

//var_dump($row_qnt_avifauna);

//var_dump($row_qnt_avifauna);

//Recuperar os registros do banco de dados
$query_avifauna = "SELECT eventID , occurrenceID, basisOfRecord, scientificName, kingdon, phylum, class, order_, family, taxonRank,reproductiveCondition, identificationQualifier, recordedBy, individualCount, sex, lifeStage, reproductiveCondition , preparations  , occurrenceRemarks
                    FROM dw_oc_avifauna"; 

if (!empty($dados_requisicao['search']['value']))  {
$query_avifauna .= " WHERE eventID  LIKE :eventID  ";
$query_avifauna .= " OR occurrenceID LIKE :occurrenceID ";
$query_avifauna .= " OR basisOfRecord LIKE :basisOfRecord ";
$query_avifauna .= " OR scientificName LIKE :scientificName ";
$query_avifauna .= " OR kingdon LIKE :kingdon ";
$query_avifauna .= " OR phylum LIKE :phylum ";
$query_avifauna .= " OR class LIKE :class ";
$query_avifauna .= " OR order_ LIKE :order ";
$query_avifauna .= " OR family LIKE :family ";
$query_avifauna .= " OR taxonRank LIKE :taxonRank ";
$query_avifauna .= " OR identificationQualifier LIKE :identificationQualifier ";
$query_avifauna .= " OR recordedBy LIKE :recordedBy ";
$query_avifauna .= " OR individualCount LIKE :individualCount ";
$query_avifauna .= " OR sex LIKE :sex ";
$query_avifauna .= " OR lifeStage LIKE :lifeStage ";
$query_avifauna .= " OR reproductiveCondition  LIKE :reproductiveCondition  ";
$query_avifauna .= " OR preparations   LIKE :preparations   ";
$query_avifauna .= " OR occurrenceRemarks LIKE :occurrenceRemarks ";

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
    $result_avifauna->bindParam(':eventID ', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':occurrenceID', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':basisOfRecord', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':scientificName', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':kingdon', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':phylum', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':class', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':order_', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':family', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':taxonRank', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':identificationQualifier', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':recordedBy', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':individualCount', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':sex', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':lifeStage', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':reproductiveCondition ', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':preparations  ', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':occurrenceRemarks', $valor_pesq, PDO::PARAM_STR);
 
}


//executar a query
$result_avifauna->execute();


//var_dump($result_avifauna);

while($row_avifauna = $result_avifauna->fetch(PDO::FETCH_ASSOC)){
      extract($row_avifauna);
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
    "recordsTotal" => intval($row_qnt_avifauna['qnt_indiv']),
    "recordsFiltered" => intval ($row_qnt_avifauna['qnt_indiv']),
    "data" => $dados
];


echo json_encode($resultados); 
