
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
$query_qnt_herpetofauna = "SELECT COUNT(id) AS qnt_indiv FROM herpetofauna";
if (!empty($dados_requisicao['search']['value']))  {
$query_qnt_herpetofauna .= " WHERE projeto LIKE :projeto ";
$query_qnt_herpetofauna .= " OR municipio LIKE :municipio ";
$query_qnt_herpetofauna .= " OR ano LIKE :ano ";
$query_qnt_herpetofauna .= " OR datas LIKE :datas ";
$query_qnt_herpetofauna .= " OR estacao LIKE :estacao ";
$query_qnt_herpetofauna .= " OR classe LIKE :classe ";
$query_qnt_herpetofauna .= " OR ordem LIKE :ordem ";
$query_qnt_herpetofauna .= " OR familia LIKE :familia ";
$query_qnt_herpetofauna .= " OR genero LIKE :genero ";
$query_qnt_herpetofauna .= " OR especie LIKE :especie ";
$query_qnt_herpetofauna .= " OR nome_popular LIKE :nome_popular ";
$query_qnt_herpetofauna .= " OR mg LIKE :mg ";
$query_qnt_herpetofauna .= " OR br LIKE :br ";
$query_qnt_herpetofauna .= " OR iucn LIKE :iucn ";
$query_qnt_herpetofauna .= " OR numero_ind LIKE :numero_ind ";
$query_qnt_herpetofauna .= " OR regiao LIKE :regiao ";
$query_qnt_herpetofauna .= " OR ponto_amostral LIKE :ponto_amostral ";
$query_qnt_herpetofauna .= " OR metodologia LIKE :metodologia ";
$query_qnt_herpetofauna .= " OR latitude LIKE :latitude ";
$query_qnt_herpetofauna .= " OR longitude LIKE :longitude ";
$query_qnt_herpetofauna .= " OR campanha LIKE :campanha ";
$query_qnt_herpetofauna .= " OR consultor LIKE :consultor ";
$query_qnt_herpetofauna .= " OR especialidade LIKE :especialidade ";
$query_qnt_herpetofauna .= " OR empresa LIKE :empresa ";
$query_qnt_herpetofauna .= " OR obs LIKE :obs ";
}

$result_qnt_herpetofauna = $conn->prepare($query_qnt_herpetofauna);


if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_qnt_herpetofauna->bindParam(':projeto', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':municipio', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':ano', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':datas', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':estacao', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':classe', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':ordem', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':familia', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':genero', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':especie', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':nome_popular', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':mg', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':br', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':iucn', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':numero_ind', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':regiao', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':ponto_amostral', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':metodologia', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':latitude', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':longitude', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':campanha', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':consultor', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':especialidade', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':empresa', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':obs', $valor_pesq, PDO::PARAM_STR);
}

//execute

$result_qnt_herpetofauna->execute();
$row_qnt_herpetofauna = $result_qnt_herpetofauna->fetch(PDO::FETCH_ASSOC);

//var_dump($row_qnt_herpetofauna);

//var_dump($row_qnt_herpetofauna);

//Recuperar os registros do banco de dados
$query_herpetofauna = "SELECT projeto, municipio, ano, datas, estacao, classe, ordem, familia, genero, especie, nome_popular, mg, br, iucn, numero_ind, regiao, ponto_amostral, metodologia, latitude, longitude, campanha, consultor, especialidade, empresa, obs 
                    FROM herpetofauna"; 

if (!empty($dados_requisicao['search']['value']))  {
$query_herpetofauna .= " WHERE projeto LIKE :projeto ";
$query_herpetofauna .= " OR municipio LIKE :municipio ";
$query_herpetofauna .= " OR ano LIKE :ano ";
$query_herpetofauna .= " OR datas LIKE :datas ";
$query_herpetofauna .= " OR estacao LIKE :estacao ";
$query_herpetofauna .= " OR classe LIKE :classe ";
$query_herpetofauna .= " OR ordem LIKE :ordem ";
$query_herpetofauna .= " OR familia LIKE :familia ";
$query_herpetofauna .= " OR genero LIKE :genero ";
$query_herpetofauna .= " OR especie LIKE :especie ";
$query_herpetofauna .= " OR nome_popular LIKE :nome_popular ";
$query_herpetofauna .= " OR mg LIKE :mg ";
$query_herpetofauna .= " OR br LIKE :br ";
$query_herpetofauna .= " OR iucn LIKE :iucn ";
$query_herpetofauna .= " OR numero_ind LIKE :numero_ind ";
$query_herpetofauna .= " OR regiao LIKE :regiao ";
$query_herpetofauna .= " OR ponto_amostral LIKE :ponto_amostral ";
$query_herpetofauna .= " OR metodologia LIKE :metodologia ";
$query_herpetofauna .= " OR latitude LIKE :latitude ";
$query_herpetofauna .= " OR longitude LIKE :longitude ";
$query_herpetofauna .= " OR campanha LIKE :campanha ";
$query_herpetofauna .= " OR consultor LIKE :consultor ";
$query_herpetofauna .= " OR especialidade LIKE :especialidade ";
$query_herpetofauna .= " OR empresa LIKE :empresa ";
$query_herpetofauna .= " OR obs LIKE :obs ";

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
    $result_herpetofauna->bindParam(':projeto', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':municipio', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':ano', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':datas', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':estacao', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':classe', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':ordem', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':familia', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':genero', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':especie', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':nome_popular', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':mg', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':br', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':iucn', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':numero_ind', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':regiao', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':ponto_amostral', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':metodologia', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':latitude', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':longitude', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':campanha', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':consultor', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':especialidade', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':empresa', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':obs', $valor_pesq, PDO::PARAM_STR);
}


//executar a query
$result_herpetofauna->execute();


//var_dump($result_herpetofauna);

while($row_herpetofauna = $result_herpetofauna->fetch(PDO::FETCH_ASSOC)){
      extract($row_herpetofauna);
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
    "recordsTotal" => intval($row_qnt_herpetofauna['qnt_indiv']),
    "recordsFiltered" => intval ($row_qnt_herpetofauna['qnt_indiv']),
    "data" => $dados
];


echo json_encode($resultados); 