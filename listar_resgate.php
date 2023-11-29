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
$query_qnt_resgate = "SELECT COUNT(id) AS qnt_indiv FROM resgate";
if (!empty($dados_requisicao['search']['value']))  {
$query_qnt_resgate .= " WHERE projeto LIKE :projeto ";
$query_qnt_resgate .= " OR municipio LIKE :municipio ";
$query_qnt_resgate .= " OR ano LIKE :ano ";
$query_qnt_resgate .= " OR datas LIKE :datas ";
$query_qnt_resgate .= " OR estacao LIKE :estacao ";
$query_qnt_resgate .= " OR classe LIKE :classe ";
$query_qnt_resgate .= " OR ordem LIKE :ordem ";
$query_qnt_resgate .= " OR familia LIKE :familia ";
$query_qnt_resgate .= " OR genero LIKE :genero ";
$query_qnt_resgate .= " OR especie LIKE :especie ";
$query_qnt_resgate .= " OR nome_popular LIKE :nome_popular ";
$query_qnt_resgate .= " OR mg LIKE :mg ";
$query_qnt_resgate .= " OR br LIKE :br ";
$query_qnt_resgate .= " OR iucn LIKE :iucn ";
$query_qnt_resgate .= " OR numero_ind LIKE :numero_ind ";
$query_qnt_resgate .= " OR regiao LIKE :regiao ";
$query_qnt_resgate .= " OR ponto_amostral LIKE :ponto_amostral ";
$query_qnt_resgate .= " OR metodologia LIKE :metodologia ";
$query_qnt_resgate .= " OR latitude LIKE :latitude ";
$query_qnt_resgate .= " OR longitude LIKE :longitude ";
$query_qnt_resgate .= " OR campanha LIKE :campanha ";
$query_qnt_resgate .= " OR consultor LIKE :consultor ";
$query_qnt_resgate .= " OR especialidade LIKE :especialidade ";
$query_qnt_resgate .= " OR empresa LIKE :empresa ";
$query_qnt_resgate .= " OR obs LIKE :obs ";
}

$result_qnt_resgate = $conn->prepare($query_qnt_resgate);


if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_qnt_resgate->bindParam(':projeto', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':municipio', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':ano', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':datas', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':estacao', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':classe', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':ordem', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':familia', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':genero', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':especie', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':nome_popular', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':mg', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':br', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':iucn', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':numero_ind', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':regiao', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':ponto_amostral', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':metodologia', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':latitude', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':longitude', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':campanha', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':consultor', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':especialidade', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':empresa', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_resgate->bindParam(':obs', $valor_pesq, PDO::PARAM_STR);
}

//execute

$result_qnt_resgate->execute();
$row_qnt_resgate = $result_qnt_resgate->fetch(PDO::FETCH_ASSOC);

//var_dump($row_qnt_resgate);

//var_dump($row_qnt_resgate);

//Recuperar os registros do banco de dados
$query_resgate = "SELECT projeto, municipio, ano, datas, estacao, classe, ordem, familia, genero, especie, nome_popular, mg, br, iucn, numero_ind, regiao, ponto_amostral, metodologia, latitude, longitude, campanha, consultor, especialidade, empresa, obs 
                    FROM resgate"; 

if (!empty($dados_requisicao['search']['value']))  {
$query_resgate .= " WHERE projeto LIKE :projeto ";
$query_resgate .= " OR municipio LIKE :municipio ";
$query_resgate .= " OR ano LIKE :ano ";
$query_resgate .= " OR datas LIKE :datas ";
$query_resgate .= " OR estacao LIKE :estacao ";
$query_resgate .= " OR classe LIKE :classe ";
$query_resgate .= " OR ordem LIKE :ordem ";
$query_resgate .= " OR familia LIKE :familia ";
$query_resgate .= " OR genero LIKE :genero ";
$query_resgate .= " OR especie LIKE :especie ";
$query_resgate .= " OR nome_popular LIKE :nome_popular ";
$query_resgate .= " OR mg LIKE :mg ";
$query_resgate .= " OR br LIKE :br ";
$query_resgate .= " OR iucn LIKE :iucn ";
$query_resgate .= " OR numero_ind LIKE :numero_ind ";
$query_resgate .= " OR regiao LIKE :regiao ";
$query_resgate .= " OR ponto_amostral LIKE :ponto_amostral ";
$query_resgate .= " OR metodologia LIKE :metodologia ";
$query_resgate .= " OR latitude LIKE :latitude ";
$query_resgate .= " OR longitude LIKE :longitude ";
$query_resgate .= " OR campanha LIKE :campanha ";
$query_resgate .= " OR consultor LIKE :consultor ";
$query_resgate .= " OR especialidade LIKE :especialidade ";
$query_resgate .= " OR empresa LIKE :empresa ";
$query_resgate .= " OR obs LIKE :obs ";

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
    $result_resgate->bindParam(':projeto', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':municipio', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':ano', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':datas', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':estacao', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':classe', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':ordem', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':familia', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':genero', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':especie', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':nome_popular', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':mg', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':br', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':iucn', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':numero_ind', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':regiao', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':ponto_amostral', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':metodologia', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':latitude', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':longitude', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':campanha', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':consultor', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':especialidade', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':empresa', $valor_pesq, PDO::PARAM_STR);
    $result_resgate->bindParam(':obs', $valor_pesq, PDO::PARAM_STR);
}


//executar a query
$result_resgate->execute();


//var_dump($result_resgate);

while($row_resgate = $result_resgate->fetch(PDO::FETCH_ASSOC)){
      extract($row_resgate);
    $registro = [];
    $registro [] = $projeto;
    $registro [] = $municipio;
    $registro [] = $ano;
    $registro [] = $datas;
    $registro [] = $estacao;
    $registro [] = $classe;
    $registro [] = $ordem;
    $registro [] = $familia;
    $registro [] = $genero;
    $registro [] = $especie;
    $registro [] = $nome_popular;
    $registro [] = $mg;
    $registro [] = $br;
    $registro [] = $iucn;
    $registro [] = $numero_ind;
    $registro [] = $regiao;
    $registro [] = $ponto_amostral;
    $registro [] = $metodologia;
    $registro [] = $latitude;
    $registro [] = $longitude;
    $registro [] = $campanha;
    $registro [] = $consultor;
    $registro [] = $especialidade;
    $registro [] = $empresa;
    $registro [] = $obs;
    $dados[] = $registro;


}

$resultados = [
    "draw" => intval ($dados_requisicao['draw']),
    "recordsTotal" => intval($row_qnt_resgate['qnt_indiv']),
    "recordsFiltered" => intval ($row_qnt_resgate['qnt_indiv']),
    "data" => $dados
];


echo json_encode($resultados); 