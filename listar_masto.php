
<?php include 'conexao.php' ?>

<?php



//Receber os dados da requisão
$dados_requisicao = $_REQUEST;

//lista de colunas na tabela


$colunas = [

    0 => 'projeto',
    1 => 'municipio',
    2 => 'ano',
    3  => 'datas',
    4  => 'estacao',
    5 => 'classe',
    6 => 'ordem',
    7 => 'familia',
    8 => 'genero',
    9 => 'especie',
    10 => 'nome_popular',
    11  => 'mg',
    12 => 'br',
    13  => 'iucn',
    14 => 'numero_ind',
    15 => 'regiao',
    16 => 'ponto_amostral',
    17 => 'metodologia',
    18 => 'latitude',
    19 => 'longitude',
    20 => 'campanha',
    21 => 'consultor',
    22 => 'especialidade',
    23 => 'empresa',
    24 => 'obs',
];



// Obter a quantidade de registros no banco de dados
$query_qnt_mastofauna = "SELECT COUNT(id) AS qnt_indiv FROM mastofauna";
if (!empty($dados_requisicao['search']['value'])) {
    $query_qnt_mastofauna .= " WHERE projeto LIKE :projeto ";
    $query_qnt_mastofauna .= " OR municipio LIKE :municipio ";
    $query_qnt_mastofauna .= " OR ano LIKE :ano ";
    $query_qnt_mastofauna .= " OR datas LIKE :datas ";
    $query_qnt_mastofauna .= " OR estacao LIKE :estacao ";
    $query_qnt_mastofauna .= " OR classe LIKE :classe ";
    $query_qnt_mastofauna .= " OR ordem LIKE :ordem ";
    $query_qnt_mastofauna .= " OR familia LIKE :familia ";
    $query_qnt_mastofauna .= " OR genero LIKE :genero ";
    $query_qnt_mastofauna .= " OR especie LIKE :especie ";
    $query_qnt_mastofauna .= " OR nome_popular LIKE :nome_popular ";
    $query_qnt_mastofauna .= " OR mg LIKE :mg ";
    $query_qnt_mastofauna .= " OR br LIKE :br ";
    $query_qnt_mastofauna .= " OR iucn LIKE :iucn ";
    $query_qnt_mastofauna .= " OR numero_ind LIKE :numero_ind ";
    $query_qnt_mastofauna .= " OR regiao LIKE :regiao ";
    $query_qnt_mastofauna .= " OR ponto_amostral LIKE :ponto_amostral ";
    $query_qnt_mastofauna .= " OR metodologia LIKE :metodologia ";
    $query_qnt_mastofauna .= " OR latitude LIKE :latitude ";
    $query_qnt_mastofauna .= " OR longitude LIKE :longitude ";
    $query_qnt_mastofauna .= " OR campanha LIKE :campanha ";
    $query_qnt_mastofauna .= " OR consultor LIKE :consultor ";
    $query_qnt_mastofauna .= " OR especialidade LIKE :especialidade ";
    $query_qnt_mastofauna .= " OR empresa LIKE :empresa ";
    $query_qnt_mastofauna .= " OR obs LIKE :obs ";
}

$result_qnt_mastofauna = $conn->prepare($query_qnt_mastofauna);


if (!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_qnt_mastofauna->bindParam(':projeto', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':municipio', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':ano', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':datas', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':estacao', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':classe', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':ordem', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':familia', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':genero', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':especie', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':nome_popular', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':mg', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':br', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':iucn', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':numero_ind', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':regiao', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':ponto_amostral', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':metodologia', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':latitude', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':longitude', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':campanha', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':consultor', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':especialidade', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':empresa', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':obs', $valor_pesq, PDO::PARAM_STR);
}

//execute

$result_qnt_mastofauna->execute();
$row_qnt_mastofauna = $result_qnt_mastofauna->fetch(PDO::FETCH_ASSOC);

//var_dump($row_qnt_mastofauna);

//var_dump($row_qnt_mastofauna);

//Recuperar os registros do banco de dados
$query_mastofauna = "SELECT projeto, municipio, ano, datas, estacao, classe, ordem, familia, genero, especie, nome_popular, mg, br, iucn, numero_ind, regiao, ponto_amostral, metodologia, latitude, longitude, campanha, consultor, especialidade, empresa, obs 
                    FROM mastofauna";

if (!empty($dados_requisicao['search']['value'])) {
    $query_mastofauna .= " WHERE projeto LIKE :projeto ";
    $query_mastofauna .= " OR municipio LIKE :municipio ";
    $query_mastofauna .= " OR ano LIKE :ano ";
    $query_mastofauna .= " OR datas LIKE :datas ";
    $query_mastofauna .= " OR estacao LIKE :estacao ";
    $query_mastofauna .= " OR classe LIKE :classe ";
    $query_mastofauna .= " OR ordem LIKE :ordem ";
    $query_mastofauna .= " OR familia LIKE :familia ";
    $query_mastofauna .= " OR genero LIKE :genero ";
    $query_mastofauna .= " OR especie LIKE :especie ";
    $query_mastofauna .= " OR nome_popular LIKE :nome_popular ";
    $query_mastofauna .= " OR mg LIKE :mg ";
    $query_mastofauna .= " OR br LIKE :br ";
    $query_mastofauna .= " OR iucn LIKE :iucn ";
    $query_mastofauna .= " OR numero_ind LIKE :numero_ind ";
    $query_mastofauna .= " OR regiao LIKE :regiao ";
    $query_mastofauna .= " OR ponto_amostral LIKE :ponto_amostral ";
    $query_mastofauna .= " OR metodologia LIKE :metodologia ";
    $query_mastofauna .= " OR latitude LIKE :latitude ";
    $query_mastofauna .= " OR longitude LIKE :longitude ";
    $query_mastofauna .= " OR campanha LIKE :campanha ";
    $query_mastofauna .= " OR consultor LIKE :consultor ";
    $query_mastofauna .= " OR especialidade LIKE :especialidade ";
    $query_mastofauna .= " OR empresa LIKE :empresa ";
    $query_mastofauna .= " OR obs LIKE :obs ";
}


//ordenar os registros  
$query_mastofauna .= " ORDER BY " . $colunas[$dados_requisicao['order'][0]['column']] . " " . $dados_requisicao['order'][0]['dir'] . " LIMIT :inicio , :quantidade";

//preparar a query
$result_mastofauna = $conn->prepare($query_mastofauna);
$result_mastofauna = $conn->prepare($query_mastofauna);
$result_mastofauna->bindparam(":inicio", $dados_requisicao['start'], PDO::PARAM_INT);
$result_mastofauna->bindparam(":quantidade", $dados_requisicao['length'], PDO::PARAM_INT);

//utilizando os parametros query de pesquisa qdo valor é digitado no campo de pesquisa
if (!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_mastofauna->bindParam(':projeto', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':municipio', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':ano', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':datas', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':estacao', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':classe', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':ordem', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':familia', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':genero', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':especie', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':nome_popular', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':mg', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':br', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':iucn', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':numero_ind', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':regiao', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':ponto_amostral', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':metodologia', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':latitude', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':longitude', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':campanha', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':consultor', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':especialidade', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':empresa', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':obs', $valor_pesq, PDO::PARAM_STR);
}


//executar a query
$result_mastofauna->execute();


//var_dump($result_mastofauna);

while ($row_mastofauna = $result_mastofauna->fetch(PDO::FETCH_ASSOC)) {
    extract($row_mastofauna);
    $registro = [];
    $registro[] = $projeto;
    $registro[] = $municipio;
    $registro[] = $ano;
    $registro[] = $datas;
    $registro[] = $estacao;
    $registro[] = $classe;
    $registro[] = $ordem;
    $registro[] = $familia;
    $registro[] = $genero;
    $registro[] = $especie;
    $registro[] = $nome_popular;
    $registro[] = $mg;
    $registro[] = $br;
    $registro[] = $iucn;
    $registro[] = $numero_ind;
    $registro[] = $regiao;
    $registro[] = $ponto_amostral;
    $registro[] = $metodologia;
    $registro[] = $latitude;
    $registro[] = $longitude;
    $registro[] = $campanha;
    $registro[] = $consultor;
    $registro[] = $especialidade;
    $registro[] = $empresa;
    $registro[] = $obs;
    $dados[] = $registro;
}

$resultados = [
    "draw" => intval($dados_requisicao['draw']),
    "recordsTotal" => intval($row_qnt_mastofauna['qnt_indiv']),
    "recordsFiltered" => intval($row_qnt_mastofauna['qnt_indiv']),
    "data" => $dados
];


echo json_encode($resultados);
