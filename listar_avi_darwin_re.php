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



    0 => 'taxonID ',
    1 => 'acceptedNameUsageID',
    2 => 'acceptedNameUsage',
    3 => 'nameAccordingTo',
    4  => 'kingdon',
    5 => 'phylum',
    6 => 'class',
    7 => 'order_',
    8 => 'family',
    9 => 'genus',
    10  => 'subgenus',
    11 => 'specificEpithet',
    12  => 'infraspecificEpithet',
    13 => 'scientificNameAuthorship',
    14 => 'taxonRank',
    15 => 'taxonomicStatus',
    16 => 'associatedReferences',
];
   


// Obter a quantidade de registros no banco de dados
$query_qnt_ictiofauna = "SELECT COUNT(id) AS qnt_indiv FROM dw_re_ictiofauna";
if (!empty($dados_requisicao['search']['value']))  {
$query_qnt_ictiofauna .= " WHERE taxonID  LIKE :taxonID ";
$query_qnt_ictiofauna .= " OR acceptedNameUsageID LIKE :acceptedNameUsageID";
$query_qnt_ictiofauna .= " OR acceptedNameUsage LIKE :acceptedNameUsage ";
$query_qnt_ictiofauna .= " OR nameAccordingTo LIKE :nameAccordingTo ";
$query_qnt_ictiofauna .= " OR kingdon LIKE :kingdon ";
$query_qnt_ictiofauna .= " OR phylum LIKE :phylum ";
$query_qnt_ictiofauna .= " OR class LIKE :class ";
$query_qnt_ictiofauna .= " OR order_ LIKE :order_ ";
$query_qnt_ictiofauna .= " OR family LIKE :family ";
$query_qnt_ictiofauna .= " OR genus LIKE :genus ";
$query_qnt_ictiofauna .= " OR subgenus LIKE :subgenus ";
$query_qnt_ictiofauna .= " OR specificEpithet LIKE :specificEpithet ";
$query_qnt_ictiofauna .= " OR infraspecificEpithet LIKE :infraspecificEpithet ";
$query_qnt_ictiofauna .= " OR scientificNameAuthorship LIKE :scientificNameAuthorship ";
$query_qnt_ictiofauna .= " OR taxonRank LIKE :taxonRank ";
$query_qnt_ictiofauna .= " OR taxonomicStatus LIKE :taxonomicStatus ";
$query_qnt_ictiofauna .= " OR associatedReferences LIKE :associatedReferences ";


}
$result_qnt_ictiofauna = $conn->prepare($query_qnt_ictiofauna);


if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_qnt_ictiofauna->bindParam(':taxonID ', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':acceptedNameUsageID', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':acceptedNameUsage', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':nameAccordingTo', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':kingdon', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':phylum', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':class', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':order_', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':family', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':genus', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':subgenus', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':specificEpithet', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':infraspecificEpithet', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':scientificNameAuthorship', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':taxonRank', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':taxonomicStatus ', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':associatedReferences', $valor_pesq, PDO::PARAM_STR);
   

}

//execute

$result_qnt_ictiofauna->execute();
$row_qnt_ictiofauna = $result_qnt_ictiofauna->fetch(PDO::FETCH_ASSOC);

//var_dump($row_qnt_ictiofauna);

//var_dump($row_qnt_ictiofauna);

//Recuperar os registros do banco de dados
$query_ictiofauna = "SELECT taxonID , acceptedNameUsageID, acceptedNameUsage, nameAccordingTo, kingdon, phylum, class, order_, family,genus, subgenus, specificEpithet, infraspecificEpithet, scientificNameAuthorship, taxonRank, taxonomicStatus ,associatedReferences 
                    FROM dw_re_ictiofauna"; 

if (!empty($dados_requisicao['search']['value']))  {
$query_ictiofauna .= " WHERE taxonID  LIKE :taxonID  ";
$query_ictiofauna .= " OR acceptedNameUsageID LIKE :acceptedNameUsageID ";
$query_ictiofauna .= " OR acceptedNameUsage LIKE :acceptedNameUsage ";
$query_ictiofauna .= " OR nameAccordingTo LIKE :nameAccordingTo ";
$query_ictiofauna .= " OR kingdon LIKE :kingdon ";
$query_ictiofauna .= " OR phylum LIKE :phylum ";
$query_ictiofauna .= " OR class LIKE :class ";
$query_ictiofauna .= " OR order_ LIKE :order ";
$query_ictiofauna .= " OR family LIKE :family ";
$query_ictiofauna .= " OR genus LIKE :genus ";
$query_ictiofauna .= " OR subgenus LIKE :subgenus ";
$query_ictiofauna .= " OR specificEpithet LIKE :specificEpithet ";
$query_ictiofauna .= " OR infraspecificEpithet LIKE :infraspecificEpithet ";
$query_ictiofauna .= " OR scientificNameAuthorship LIKE :scientificNameAuthorship";
$query_ictiofauna .= " OR taxonRank LIKE :taxonRank ";
$query_ictiofauna .= " OR taxonomicStatus  LIKE :taxonomicStatus";
$query_ictiofauna .= " OR associatedReferences  LIKE :associatedReferences   ";


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
    $result_ictiofauna->bindParam(':taxonID ', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':acceptedNameUsageID', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':acceptedNameUsage', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':nameAccordingTo', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':kingdon', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':phylum', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':class', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':order_', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':family', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':genus', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':subgenus', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':specificEpithet', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':infraspecificEpithet', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':scientificNameAuthorship', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':taxonRank', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':taxonomicStatus ', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':associatedReferences  ', $valor_pesq, PDO::PARAM_STR);

 
}


//executar a query
$result_ictiofauna->execute();


//var_dump($result_ictiofauna);

while($row_ictiofauna = $result_ictiofauna->fetch(PDO::FETCH_ASSOC)){
      extract($row_ictiofauna);
    $registro = [];
    $registro [] = $taxonID ;
    $registro [] = $acceptedNameUsageID;
    $registro [] = $acceptedNameUsage;
    $registro [] = $nameAccordingTo;
    $registro [] = $kingdon;
    $registro [] = $phylum;
    $registro [] = $class;
    $registro [] = $order_;
    $registro [] = $family;
    $registro [] = $genus;
    $registro [] = $subgenus;
    $registro [] = $specificEpithet;
    $registro [] = $infraspecificEpithet;
    $registro [] = $scientificNameAuthorship;
    $registro [] = $taxonRank;
    $registro [] = $taxonomicStatus ;
    $registro [] = $associatedReferences  ;

    $dados[] = $registro;


}

$resultados = [
    "draw" => intval ($dados_requisicao['draw']),
    "recordsTotal" => intval($row_qnt_ictiofauna['qnt_indiv']),
    "recordsFiltered" => intval ($row_qnt_ictiofauna['qnt_indiv']),
    "data" => $dados
];


echo json_encode($resultados); 



