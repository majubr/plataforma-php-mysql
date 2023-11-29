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
$query_qnt_herpetofauna = "SELECT COUNT(id) AS qnt_indiv FROM dw_re_herpetofauna";
if (!empty($dados_requisicao['search']['value']))  {
$query_qnt_herpetofauna .= " WHERE taxonID  LIKE :taxonID ";
$query_qnt_herpetofauna .= " OR acceptedNameUsageID LIKE :acceptedNameUsageID";
$query_qnt_herpetofauna .= " OR acceptedNameUsage LIKE :acceptedNameUsage ";
$query_qnt_herpetofauna .= " OR nameAccordingTo LIKE :nameAccordingTo ";
$query_qnt_herpetofauna .= " OR kingdon LIKE :kingdon ";
$query_qnt_herpetofauna .= " OR phylum LIKE :phylum ";
$query_qnt_herpetofauna .= " OR class LIKE :class ";
$query_qnt_herpetofauna .= " OR order_ LIKE :order_ ";
$query_qnt_herpetofauna .= " OR family LIKE :family ";
$query_qnt_herpetofauna .= " OR genus LIKE :genus ";
$query_qnt_herpetofauna .= " OR subgenus LIKE :subgenus ";
$query_qnt_herpetofauna .= " OR specificEpithet LIKE :specificEpithet ";
$query_qnt_herpetofauna .= " OR infraspecificEpithet LIKE :infraspecificEpithet ";
$query_qnt_herpetofauna .= " OR scientificNameAuthorship LIKE :scientificNameAuthorship ";
$query_qnt_herpetofauna .= " OR taxonRank LIKE :taxonRank ";
$query_qnt_herpetofauna .= " OR taxonomicStatus LIKE :taxonomicStatus ";
$query_qnt_herpetofauna .= " OR associatedReferences LIKE :associatedReferences ";


}
$result_qnt_herpetofauna = $conn->prepare($query_qnt_herpetofauna);


if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_qnt_herpetofauna->bindParam(':taxonID ', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':acceptedNameUsageID', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':acceptedNameUsage', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':nameAccordingTo', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':kingdon', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':phylum', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':class', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':order_', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':family', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':genus', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':subgenus', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':specificEpithet', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':infraspecificEpithet', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':scientificNameAuthorship', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':taxonRank', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':taxonomicStatus ', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':associatedReferences', $valor_pesq, PDO::PARAM_STR);
   

}

//execute

$result_qnt_herpetofauna->execute();
$row_qnt_herpetofauna = $result_qnt_herpetofauna->fetch(PDO::FETCH_ASSOC);

//var_dump($row_qnt_herpetofauna);

//var_dump($row_qnt_herpetofauna);

//Recuperar os registros do banco de dados
$query_herpetofauna = "SELECT taxonID , acceptedNameUsageID, acceptedNameUsage, nameAccordingTo, kingdon, phylum, class, order_, family,genus, subgenus, specificEpithet, infraspecificEpithet, scientificNameAuthorship, taxonRank, taxonomicStatus ,associatedReferences 
                    FROM dw_re_herpetofauna"; 

if (!empty($dados_requisicao['search']['value']))  {
$query_herpetofauna .= " WHERE taxonID  LIKE :taxonID  ";
$query_herpetofauna .= " OR acceptedNameUsageID LIKE :acceptedNameUsageID ";
$query_herpetofauna .= " OR acceptedNameUsage LIKE :acceptedNameUsage ";
$query_herpetofauna .= " OR nameAccordingTo LIKE :nameAccordingTo ";
$query_herpetofauna .= " OR kingdon LIKE :kingdon ";
$query_herpetofauna .= " OR phylum LIKE :phylum ";
$query_herpetofauna .= " OR class LIKE :class ";
$query_herpetofauna .= " OR order_ LIKE :order ";
$query_herpetofauna .= " OR family LIKE :family ";
$query_herpetofauna .= " OR genus LIKE :genus ";
$query_herpetofauna .= " OR subgenus LIKE :subgenus ";
$query_herpetofauna .= " OR specificEpithet LIKE :specificEpithet ";
$query_herpetofauna .= " OR infraspecificEpithet LIKE :infraspecificEpithet ";
$query_herpetofauna .= " OR scientificNameAuthorship LIKE :scientificNameAuthorship";
$query_herpetofauna .= " OR taxonRank LIKE :taxonRank ";
$query_herpetofauna .= " OR taxonomicStatus  LIKE :taxonomicStatus";
$query_herpetofauna .= " OR associatedReferences  LIKE :associatedReferences   ";


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
    $result_herpetofauna->bindParam(':taxonID ', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':acceptedNameUsageID', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':acceptedNameUsage', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':nameAccordingTo', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':kingdon', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':phylum', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':class', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':order_', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':family', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':genus', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':subgenus', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':specificEpithet', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':infraspecificEpithet', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':scientificNameAuthorship', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':taxonRank', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':taxonomicStatus ', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':associatedReferences  ', $valor_pesq, PDO::PARAM_STR);

 
}


//executar a query
$result_herpetofauna->execute();


//var_dump($result_herpetofauna);

while($row_herpetofauna = $result_herpetofauna->fetch(PDO::FETCH_ASSOC)){
      extract($row_herpetofauna);
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
    "recordsTotal" => intval($row_qnt_herpetofauna['qnt_indiv']),
    "recordsFiltered" => intval ($row_qnt_herpetofauna['qnt_indiv']),
    "data" => $dados
];


echo json_encode($resultados); 

