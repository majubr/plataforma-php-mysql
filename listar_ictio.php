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
$query_qnt_ictiofauna = "SELECT COUNT(id) AS qnt_indiv FROM ictiofauna";
if (!empty($dados_requisicao['search']['value']))  {
$query_qnt_ictiofauna .= " WHERE projeto LIKE :projeto ";
$query_qnt_ictiofauna .= " OR municipio LIKE :municipio ";
$query_qnt_ictiofauna .= " OR ano LIKE :ano ";
$query_qnt_ictiofauna .= " OR datas LIKE :datas ";
$query_qnt_ictiofauna .= " OR estacao LIKE :estacao ";
$query_qnt_ictiofauna .= " OR classe LIKE :classe ";
$query_qnt_ictiofauna .= " OR ordem LIKE :ordem ";
$query_qnt_ictiofauna .= " OR familia LIKE :familia ";
$query_qnt_ictiofauna .= " OR genero LIKE :genero ";
$query_qnt_ictiofauna .= " OR especie LIKE :especie ";
$query_qnt_ictiofauna .= " OR nome_popular LIKE :nome_popular ";
$query_qnt_ictiofauna .= " OR mg LIKE :mg ";
$query_qnt_ictiofauna .= " OR br LIKE :br ";
$query_qnt_ictiofauna .= " OR iucn LIKE :iucn ";
$query_qnt_ictiofauna .= " OR numero_ind LIKE :numero_ind ";
$query_qnt_ictiofauna .= " OR regiao LIKE :regiao ";
$query_qnt_ictiofauna .= " OR ponto_amostral LIKE :ponto_amostral ";
$query_qnt_ictiofauna .= " OR metodologia LIKE :metodologia ";
$query_qnt_ictiofauna .= " OR latitude LIKE :latitude ";
$query_qnt_ictiofauna .= " OR longitude LIKE :longitude ";
$query_qnt_ictiofauna .= " OR campanha LIKE :campanha ";
$query_qnt_ictiofauna .= " OR consultor LIKE :consultor ";
$query_qnt_ictiofauna .= " OR especialidade LIKE :especialidade ";
$query_qnt_ictiofauna .= " OR empresa LIKE :empresa ";
$query_qnt_ictiofauna .= " OR obs LIKE :obs ";
}

$result_qnt_ictiofauna = $conn->prepare($query_qnt_ictiofauna);


if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_qnt_ictiofauna->bindParam(':projeto', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':municipio', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':ano', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':datas', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':estacao', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':classe', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':ordem', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':familia', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':genero', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':especie', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':nome_popular', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':mg', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':br', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':iucn', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':numero_ind', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':regiao', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':ponto_amostral', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':metodologia', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':latitude', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':longitude', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':campanha', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':consultor', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':especialidade', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':empresa', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':obs', $valor_pesq, PDO::PARAM_STR);
}

//execute

$result_qnt_ictiofauna->execute();
$row_qnt_ictiofauna = $result_qnt_ictiofauna->fetch(PDO::FETCH_ASSOC);

//var_dump($row_qnt_ictiofauna);

//var_dump($row_qnt_ictiofauna);

//Recuperar os registros do banco de dados
$query_ictiofauna = "SELECT projeto, municipio, ano, datas, estacao, classe, ordem, familia, genero, especie, nome_popular, mg, br, iucn, numero_ind, regiao, ponto_amostral, metodologia, latitude, longitude, campanha, consultor, especialidade, empresa, obs 
                    FROM ictiofauna"; 

if (!empty($dados_requisicao['search']['value']))  {
$query_ictiofauna .= " WHERE projeto LIKE :projeto ";
$query_ictiofauna .= " OR municipio LIKE :municipio ";
$query_ictiofauna .= " OR ano LIKE :ano ";
$query_ictiofauna .= " OR datas LIKE :datas ";
$query_ictiofauna .= " OR estacao LIKE :estacao ";
$query_ictiofauna .= " OR classe LIKE :classe ";
$query_ictiofauna .= " OR ordem LIKE :ordem ";
$query_ictiofauna .= " OR familia LIKE :familia ";
$query_ictiofauna .= " OR genero LIKE :genero ";
$query_ictiofauna .= " OR especie LIKE :especie ";
$query_ictiofauna .= " OR nome_popular LIKE :nome_popular ";
$query_ictiofauna .= " OR mg LIKE :mg ";
$query_ictiofauna .= " OR br LIKE :br ";
$query_ictiofauna .= " OR iucn LIKE :iucn ";
$query_ictiofauna .= " OR numero_ind LIKE :numero_ind ";
$query_ictiofauna .= " OR regiao LIKE :regiao ";
$query_ictiofauna .= " OR ponto_amostral LIKE :ponto_amostral ";
$query_ictiofauna .= " OR metodologia LIKE :metodologia ";
$query_ictiofauna .= " OR latitude LIKE :latitude ";
$query_ictiofauna .= " OR longitude LIKE :longitude ";
$query_ictiofauna .= " OR campanha LIKE :campanha ";
$query_ictiofauna .= " OR consultor LIKE :consultor ";
$query_ictiofauna .= " OR especialidade LIKE :especialidade ";
$query_ictiofauna .= " OR empresa LIKE :empresa ";
$query_ictiofauna .= " OR obs LIKE :obs ";

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
    $result_ictiofauna->bindParam(':projeto', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':municipio', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':ano', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':datas', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':estacao', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':classe', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':ordem', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':familia', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':genero', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':especie', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':nome_popular', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':mg', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':br', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':iucn', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':numero_ind', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':regiao', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':ponto_amostral', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':metodologia', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':latitude', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':longitude', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':campanha', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':consultor', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':especialidade', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':empresa', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':obs', $valor_pesq, PDO::PARAM_STR);
}


//executar a query
$result_ictiofauna->execute();


//var_dump($result_ictiofauna);

while($row_ictiofauna = $result_ictiofauna->fetch(PDO::FETCH_ASSOC)){
      extract($row_ictiofauna);
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
    "recordsTotal" => intval($row_qnt_ictiofauna['qnt_indiv']),
    "recordsFiltered" => intval ($row_qnt_ictiofauna['qnt_indiv']),
    "data" => $dados
];


echo json_encode($resultados); 
