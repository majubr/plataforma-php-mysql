
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
$query_qnt_avifauna = "SELECT COUNT(id) AS qnt_indiv FROM avifauna";
if (!empty($dados_requisicao['search']['value'])) {
    $query_qnt_avifauna .= " WHERE projeto LIKE :projeto ";
    $query_qnt_avifauna .= " OR municipio LIKE :municipio ";
    $query_qnt_avifauna .= " OR ano LIKE :ano ";
    $query_qnt_avifauna .= " OR datas LIKE :datas ";
    $query_qnt_avifauna .= " OR estacao LIKE :estacao ";
    $query_qnt_avifauna .= " OR classe LIKE :classe ";
    $query_qnt_avifauna .= " OR ordem LIKE :ordem ";
    $query_qnt_avifauna .= " OR familia LIKE :familia ";
    $query_qnt_avifauna .= " OR genero LIKE :genero ";
    $query_qnt_avifauna .= " OR especie LIKE :especie ";
    $query_qnt_avifauna .= " OR nome_popular LIKE :nome_popular ";
    $query_qnt_avifauna .= " OR mg LIKE :mg ";
    $query_qnt_avifauna .= " OR br LIKE :br ";
    $query_qnt_avifauna .= " OR iucn LIKE :iucn ";
    $query_qnt_avifauna .= " OR numero_ind LIKE :numero_ind ";
    $query_qnt_avifauna .= " OR regiao LIKE :regiao ";
    $query_qnt_avifauna .= " OR ponto_amostral LIKE :ponto_amostral ";
    $query_qnt_avifauna .= " OR metodologia LIKE :metodologia ";
    $query_qnt_avifauna .= " OR latitude LIKE :latitude ";
    $query_qnt_avifauna .= " OR longitude LIKE :longitude ";
    $query_qnt_avifauna .= " OR campanha LIKE :campanha ";
    $query_qnt_avifauna .= " OR consultor LIKE :consultor ";
    $query_qnt_avifauna .= " OR especialidade LIKE :especialidade ";
    $query_qnt_avifauna .= " OR empresa LIKE :empresa ";
    $query_qnt_avifauna .= " OR obs LIKE :obs ";
}

$result_qnt_avifauna = $conn->prepare($query_qnt_avifauna);


if (!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_qnt_avifauna->bindParam(':projeto', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':municipio', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':ano', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':datas', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':estacao', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':classe', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':ordem', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':familia', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':genero', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':especie', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':nome_popular', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':mg', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':br', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':iucn', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':numero_ind', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':regiao', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':ponto_amostral', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':metodologia', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':latitude', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':longitude', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':campanha', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':consultor', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':especialidade', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':empresa', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':obs', $valor_pesq, PDO::PARAM_STR);
}

//execute

$result_qnt_avifauna->execute();
$row_qnt_avifauna = $result_qnt_avifauna->fetch(PDO::FETCH_ASSOC);

//var_dump($row_qnt_avifauna);

//var_dump($row_qnt_avifauna);

//Recuperar os registros do banco de dados
$query_avifauna = "SELECT projeto, municipio, ano, datas, estacao, classe, ordem, familia, genero, especie, nome_popular, mg, br, iucn, numero_ind, regiao, ponto_amostral, metodologia, latitude, longitude, campanha, consultor, especialidade, empresa, obs 
                    FROM avifauna";

if (!empty($dados_requisicao['search']['value'])) {
    $query_avifauna .= " WHERE projeto LIKE :projeto ";
    $query_avifauna .= " OR municipio LIKE :municipio ";
    $query_avifauna .= " OR ano LIKE :ano ";
    $query_avifauna .= " OR datas LIKE :datas ";
    $query_avifauna .= " OR estacao LIKE :estacao ";
    $query_avifauna .= " OR classe LIKE :classe ";
    $query_avifauna .= " OR ordem LIKE :ordem ";
    $query_avifauna .= " OR familia LIKE :familia ";
    $query_avifauna .= " OR genero LIKE :genero ";
    $query_avifauna .= " OR especie LIKE :especie ";
    $query_avifauna .= " OR nome_popular LIKE :nome_popular ";
    $query_avifauna .= " OR mg LIKE :mg ";
    $query_avifauna .= " OR br LIKE :br ";
    $query_avifauna .= " OR iucn LIKE :iucn ";
    $query_avifauna .= " OR numero_ind LIKE :numero_ind ";
    $query_avifauna .= " OR regiao LIKE :regiao ";
    $query_avifauna .= " OR ponto_amostral LIKE :ponto_amostral ";
    $query_avifauna .= " OR metodologia LIKE :metodologia ";
    $query_avifauna .= " OR latitude LIKE :latitude ";
    $query_avifauna .= " OR longitude LIKE :longitude ";
    $query_avifauna .= " OR campanha LIKE :campanha ";
    $query_avifauna .= " OR consultor LIKE :consultor ";
    $query_avifauna .= " OR especialidade LIKE :especialidade ";
    $query_avifauna .= " OR empresa LIKE :empresa ";
    $query_avifauna .= " OR obs LIKE :obs ";
}


//ordenar os registros  
$query_avifauna .= " ORDER BY " . $colunas[$dados_requisicao['order'][0]['column']] . " " . $dados_requisicao['order'][0]['dir'] . " LIMIT :inicio , :quantidade";

//preparar a query
$result_avifauna = $conn->prepare($query_avifauna);
$result_avifauna = $conn->prepare($query_avifauna);
$result_avifauna->bindparam(":inicio", $dados_requisicao['start'], PDO::PARAM_INT);
$result_avifauna->bindparam(":quantidade", $dados_requisicao['length'], PDO::PARAM_INT);

//utilizando os parametros query de pesquisa qdo valor é digitado no campo de pesquisa
if (!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_avifauna->bindParam(':projeto', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':municipio', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':ano', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':datas', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':estacao', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':classe', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':ordem', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':familia', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':genero', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':especie', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':nome_popular', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':mg', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':br', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':iucn', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':numero_ind', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':regiao', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':ponto_amostral', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':metodologia', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':latitude', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':longitude', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':campanha', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':consultor', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':especialidade', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':empresa', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':obs', $valor_pesq, PDO::PARAM_STR);
}


//executar a query
$result_avifauna->execute();


//var_dump($result_avifauna);

while ($row_avifauna = $result_avifauna->fetch(PDO::FETCH_ASSOC)) {
    extract($row_avifauna);
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
    "recordsTotal" => intval($row_qnt_avifauna['qnt_indiv']),
    "recordsFiltered" => intval($row_qnt_avifauna['qnt_indiv']),
    "data" => $dados
];


echo json_encode($resultados);
