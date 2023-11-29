
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
$query_qnt_ictiofauna = "SELECT COUNT(id) AS qnt_indiv FROM dw_oc_ictiofauna";
if (!empty($dados_requisicao['search']['value']))  {
$query_qnt_ictiofauna .= " WHERE eventID  LIKE :eventID ";
$query_qnt_ictiofauna .= " OR occurrenceID LIKE :occurrenceID";
$query_qnt_ictiofauna .= " OR basisOfRecord LIKE :basisOfRecord ";
$query_qnt_ictiofauna .= " OR scientificName LIKE :cientificName ";
$query_qnt_ictiofauna .= " OR kingdon LIKE :kingdon ";
$query_qnt_ictiofauna .= " OR phylum LIKE :phylum ";
$query_qnt_ictiofauna .= " OR class LIKE :class ";
$query_qnt_ictiofauna .= " OR order_ LIKE :order ";
$query_qnt_ictiofauna .= " OR family LIKE :family ";
$query_qnt_ictiofauna .= " OR taxonRank LIKE :taxonRank ";
$query_qnt_ictiofauna .= " OR identificationQualifier LIKE :identificationQualifier ";
$query_qnt_ictiofauna .= " OR recordedBy LIKE :recordedBy ";
$query_qnt_ictiofauna .= " OR individualCount LIKE :individualCount ";
$query_qnt_ictiofauna .= " OR sex LIKE :sex ";
$query_qnt_ictiofauna .= " OR lifeStage LIKE :lifeStage ";
$query_qnt_ictiofauna .= " OR reproductiveCondition LIKE :reproductiveCondition ";
$query_qnt_ictiofauna .= " OR preparations LIKE :preparations ";
$query_qnt_ictiofauna .= " OR occurrenceRemarks LIKE :occurrenceRemarks";

}
$result_qnt_ictiofauna = $conn->prepare($query_qnt_ictiofauna);


if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_qnt_ictiofauna->bindParam(':eventID ', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':occurrenceID', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':basisOfRecord', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':scientificName', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':kingdon', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':phylum', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':class', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':order_', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':family', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':taxonRank', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':identificationQualifier', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':recordedBy', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':individualCount', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':sex', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':lifeStage', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':reproductiveCondition ', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':preparations  ', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':occurrenceRemarks', $valor_pesq, PDO::PARAM_STR);

}

//execute

$result_qnt_ictiofauna->execute();
$row_qnt_ictiofauna = $result_qnt_ictiofauna->fetch(PDO::FETCH_ASSOC);

//var_dump($row_qnt_ictiofauna);

//var_dump($row_qnt_ictiofauna);

//Recuperar os registros do banco de dados
$query_ictiofauna = "SELECT eventID , occurrenceID, basisOfRecord, scientificName, kingdon, phylum, class, order_, family, taxonRank,reproductiveCondition, identificationQualifier, recordedBy, individualCount, sex, lifeStage, reproductiveCondition , preparations  , occurrenceRemarks
                    FROM dw_oc_ictiofauna"; 

if (!empty($dados_requisicao['search']['value']))  {
$query_ictiofauna .= " WHERE eventID  LIKE :eventID  ";
$query_ictiofauna .= " OR occurrenceID LIKE :occurrenceID ";
$query_ictiofauna .= " OR basisOfRecord LIKE :basisOfRecord ";
$query_ictiofauna .= " OR scientificName LIKE :scientificName ";
$query_ictiofauna .= " OR kingdon LIKE :kingdon ";
$query_ictiofauna .= " OR phylum LIKE :phylum ";
$query_ictiofauna .= " OR class LIKE :class ";
$query_ictiofauna .= " OR order_ LIKE :order ";
$query_ictiofauna .= " OR family LIKE :family ";
$query_ictiofauna .= " OR taxonRank LIKE :taxonRank ";
$query_ictiofauna .= " OR identificationQualifier LIKE :identificationQualifier ";
$query_ictiofauna .= " OR recordedBy LIKE :recordedBy ";
$query_ictiofauna .= " OR individualCount LIKE :individualCount ";
$query_ictiofauna .= " OR sex LIKE :sex ";
$query_ictiofauna .= " OR lifeStage LIKE :lifeStage ";
$query_ictiofauna .= " OR reproductiveCondition  LIKE :reproductiveCondition  ";
$query_ictiofauna .= " OR preparations   LIKE :preparations   ";
$query_ictiofauna .= " OR occurrenceRemarks LIKE :occurrenceRemarks ";

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
    $result_ictiofauna->bindParam(':eventID ', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':occurrenceID', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':basisOfRecord', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':scientificName', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':kingdon', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':phylum', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':class', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':order_', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':family', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':taxonRank', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':identificationQualifier', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':recordedBy', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':individualCount', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':sex', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':lifeStage', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':reproductiveCondition ', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':preparations  ', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':occurrenceRemarks', $valor_pesq, PDO::PARAM_STR);
 
}


//executar a query
$result_ictiofauna->execute();


//var_dump($result_ictiofauna);

while($row_ictiofauna = $result_ictiofauna->fetch(PDO::FETCH_ASSOC)){
      extract($row_ictiofauna);
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
    "recordsTotal" => intval($row_qnt_ictiofauna['qnt_indiv']),
    "recordsFiltered" => intval ($row_qnt_ictiofauna['qnt_indiv']),
    "data" => $dados
];


echo json_encode($resultados); 
