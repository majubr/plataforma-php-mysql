
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
$query_qnt_mastofauna = "SELECT COUNT(id) AS qnt_indiv FROM dw_re_mastofauna";
if (!empty($dados_requisicao['search']['value']))  {
$query_qnt_mastofauna .= " WHERE taxonID  LIKE :taxonID ";
$query_qnt_mastofauna .= " OR acceptedNameUsageID LIKE :acceptedNameUsageID";
$query_qnt_mastofauna .= " OR acceptedNameUsage LIKE :acceptedNameUsage ";
$query_qnt_mastofauna .= " OR nameAccordingTo LIKE :nameAccordingTo ";
$query_qnt_mastofauna .= " OR kingdon LIKE :kingdon ";
$query_qnt_mastofauna .= " OR phylum LIKE :phylum ";
$query_qnt_mastofauna .= " OR class LIKE :class ";
$query_qnt_mastofauna .= " OR order_ LIKE :order_ ";
$query_qnt_mastofauna .= " OR family LIKE :family ";
$query_qnt_mastofauna .= " OR genus LIKE :genus ";
$query_qnt_mastofauna .= " OR subgenus LIKE :subgenus ";
$query_qnt_mastofauna .= " OR specificEpithet LIKE :specificEpithet ";
$query_qnt_mastofauna .= " OR infraspecificEpithet LIKE :infraspecificEpithet ";
$query_qnt_mastofauna .= " OR scientificNameAuthorship LIKE :scientificNameAuthorship ";
$query_qnt_mastofauna .= " OR taxonRank LIKE :taxonRank ";
$query_qnt_mastofauna .= " OR taxonomicStatus LIKE :taxonomicStatus ";
$query_qnt_mastofauna .= " OR associatedReferences LIKE :associatedReferences ";


}
$result_qnt_mastofauna = $conn->prepare($query_qnt_mastofauna);


if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_qnt_mastofauna->bindParam(':taxonID ', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':acceptedNameUsageID', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':acceptedNameUsage', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':nameAccordingTo', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':kingdon', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':phylum', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':class', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':order_', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':family', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':genus', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':subgenus', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':specificEpithet', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':infraspecificEpithet', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':scientificNameAuthorship', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':taxonRank', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':taxonomicStatus ', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':associatedReferences', $valor_pesq, PDO::PARAM_STR);
   

}

//execute

$result_qnt_mastofauna->execute();
$row_qnt_mastofauna = $result_qnt_mastofauna->fetch(PDO::FETCH_ASSOC);

//var_dump($row_qnt_mastofauna);

//var_dump($row_qnt_mastofauna);

//Recuperar os registros do banco de dados
$query_mastofauna = "SELECT taxonID , acceptedNameUsageID, acceptedNameUsage, nameAccordingTo, kingdon, phylum, class, order_, family,genus, subgenus, specificEpithet, infraspecificEpithet, scientificNameAuthorship, taxonRank, taxonomicStatus ,associatedReferences 
                    FROM dw_re_mastofauna"; 

if (!empty($dados_requisicao['search']['value']))  {
$query_mastofauna .= " WHERE taxonID  LIKE :taxonID  ";
$query_mastofauna .= " OR acceptedNameUsageID LIKE :acceptedNameUsageID ";
$query_mastofauna .= " OR acceptedNameUsage LIKE :acceptedNameUsage ";
$query_mastofauna .= " OR nameAccordingTo LIKE :nameAccordingTo ";
$query_mastofauna .= " OR kingdon LIKE :kingdon ";
$query_mastofauna .= " OR phylum LIKE :phylum ";
$query_mastofauna .= " OR class LIKE :class ";
$query_mastofauna .= " OR order_ LIKE :order ";
$query_mastofauna .= " OR family LIKE :family ";
$query_mastofauna .= " OR genus LIKE :genus ";
$query_mastofauna .= " OR subgenus LIKE :subgenus ";
$query_mastofauna .= " OR specificEpithet LIKE :specificEpithet ";
$query_mastofauna .= " OR infraspecificEpithet LIKE :infraspecificEpithet ";
$query_mastofauna .= " OR scientificNameAuthorship LIKE :scientificNameAuthorship";
$query_mastofauna .= " OR taxonRank LIKE :taxonRank ";
$query_mastofauna .= " OR taxonomicStatus  LIKE :taxonomicStatus";
$query_mastofauna .= " OR associatedReferences  LIKE :associatedReferences   ";


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
    $result_mastofauna->bindParam(':taxonID ', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':acceptedNameUsageID', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':acceptedNameUsage', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':nameAccordingTo', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':kingdon', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':phylum', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':class', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':order_', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':family', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':genus', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':subgenus', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':specificEpithet', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':infraspecificEpithet', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':scientificNameAuthorship', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':taxonRank', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':taxonomicStatus ', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':associatedReferences  ', $valor_pesq, PDO::PARAM_STR);

 
}


//executar a query
$result_mastofauna->execute();


//var_dump($result_mastofauna);

while($row_mastofauna = $result_mastofauna->fetch(PDO::FETCH_ASSOC)){
      extract($row_mastofauna);
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
    "recordsTotal" => intval($row_qnt_mastofauna['qnt_indiv']),
    "recordsFiltered" => intval ($row_qnt_mastofauna['qnt_indiv']),
    "data" => $dados
];


echo json_encode($resultados); 

