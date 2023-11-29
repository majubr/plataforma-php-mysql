
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
$query_qnt_herpetofauna = "SELECT COUNT(id) AS qnt_indiv FROM dw_oc_herpetofauna";
if (!empty($dados_requisicao['search']['value']))  {
$query_qnt_herpetofauna .= " WHERE eventID  LIKE :eventID ";
$query_qnt_herpetofauna .= " OR occurrenceID LIKE :occurrenceID";
$query_qnt_herpetofauna .= " OR basisOfRecord LIKE :basisOfRecord ";
$query_qnt_herpetofauna .= " OR scientificName LIKE :cientificName ";
$query_qnt_herpetofauna .= " OR kingdon LIKE :kingdon ";
$query_qnt_herpetofauna .= " OR phylum LIKE :phylum ";
$query_qnt_herpetofauna .= " OR class LIKE :class ";
$query_qnt_herpetofauna .= " OR order_ LIKE :order ";
$query_qnt_herpetofauna .= " OR family LIKE :family ";
$query_qnt_herpetofauna .= " OR taxonRank LIKE :taxonRank ";
$query_qnt_herpetofauna .= " OR identificationQualifier LIKE :identificationQualifier ";
$query_qnt_herpetofauna .= " OR recordedBy LIKE :recordedBy ";
$query_qnt_herpetofauna .= " OR individualCount LIKE :individualCount ";
$query_qnt_herpetofauna .= " OR sex LIKE :sex ";
$query_qnt_herpetofauna .= " OR lifeStage LIKE :lifeStage ";
$query_qnt_herpetofauna .= " OR reproductiveCondition LIKE :reproductiveCondition ";
$query_qnt_herpetofauna .= " OR preparations LIKE :preparations ";
$query_qnt_herpetofauna .= " OR occurrenceRemarks LIKE :occurrenceRemarks";

}
$result_qnt_herpetofauna = $conn->prepare($query_qnt_herpetofauna);


if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_qnt_herpetofauna->bindParam(':eventID ', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':occurrenceID', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':basisOfRecord', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':scientificName', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':kingdon', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':phylum', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':class', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':order_', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':family', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':taxonRank', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':identificationQualifier', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':recordedBy', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':individualCount', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':sex', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':lifeStage', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':reproductiveCondition ', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':preparations  ', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':occurrenceRemarks', $valor_pesq, PDO::PARAM_STR);

}

//execute

$result_qnt_herpetofauna->execute();
$row_qnt_herpetofauna = $result_qnt_herpetofauna->fetch(PDO::FETCH_ASSOC);

//var_dump($row_qnt_herpetofauna);

//var_dump($row_qnt_herpetofauna);

//Recuperar os registros do banco de dados
$query_herpetofauna = "SELECT eventID , occurrenceID, basisOfRecord, scientificName, kingdon, phylum, class, order_, family, taxonRank,reproductiveCondition, identificationQualifier, recordedBy, individualCount, sex, lifeStage, reproductiveCondition , preparations  , occurrenceRemarks
                    FROM dw_oc_herpetofauna"; 

if (!empty($dados_requisicao['search']['value']))  {
$query_herpetofauna .= " WHERE eventID  LIKE :eventID  ";
$query_herpetofauna .= " OR occurrenceID LIKE :occurrenceID ";
$query_herpetofauna .= " OR basisOfRecord LIKE :basisOfRecord ";
$query_herpetofauna .= " OR scientificName LIKE :scientificName ";
$query_herpetofauna .= " OR kingdon LIKE :kingdon ";
$query_herpetofauna .= " OR phylum LIKE :phylum ";
$query_herpetofauna .= " OR class LIKE :class ";
$query_herpetofauna .= " OR order_ LIKE :order ";
$query_herpetofauna .= " OR family LIKE :family ";
$query_herpetofauna .= " OR taxonRank LIKE :taxonRank ";
$query_herpetofauna .= " OR identificationQualifier LIKE :identificationQualifier ";
$query_herpetofauna .= " OR recordedBy LIKE :recordedBy ";
$query_herpetofauna .= " OR individualCount LIKE :individualCount ";
$query_herpetofauna .= " OR sex LIKE :sex ";
$query_herpetofauna .= " OR lifeStage LIKE :lifeStage ";
$query_herpetofauna .= " OR reproductiveCondition  LIKE :reproductiveCondition  ";
$query_herpetofauna .= " OR preparations   LIKE :preparations   ";
$query_herpetofauna .= " OR occurrenceRemarks LIKE :occurrenceRemarks ";

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
    $result_herpetofauna->bindParam(':eventID ', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':occurrenceID', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':basisOfRecord', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':scientificName', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':kingdon', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':phylum', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':class', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':order_', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':family', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':taxonRank', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':identificationQualifier', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':recordedBy', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':individualCount', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':sex', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':lifeStage', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':reproductiveCondition ', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':preparations  ', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':occurrenceRemarks', $valor_pesq, PDO::PARAM_STR);
 
}


//executar a query
$result_herpetofauna->execute();


//var_dump($result_herpetofauna);

while($row_herpetofauna = $result_herpetofauna->fetch(PDO::FETCH_ASSOC)){
      extract($row_herpetofauna);
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
    "recordsTotal" => intval($row_qnt_herpetofauna['qnt_indiv']),
    "recordsFiltered" => intval ($row_qnt_herpetofauna['qnt_indiv']),
    "data" => $dados
];


echo json_encode($resultados); 
