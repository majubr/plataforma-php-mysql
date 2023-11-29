
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
    1 => 'individuo',
    2 => 'ano',
    3  => 'datas',
    4  => 'hora',
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
$query_qnt_radiocolar_lobo = "SELECT COUNT(id) AS qnt_indiv FROM radiocolar_lobo";
if (!empty($dados_requisicao['search']['value']))  {
$query_qnt_radiocolar_lobo .= " WHERE projeto LIKE :projeto ";
$query_qnt_radiocolar_lobo .= " OR individuo LIKE :individuo ";
$query_qnt_radiocolar_lobo .= " OR ano LIKE :ano ";
$query_qnt_radiocolar_lobo .= " OR datas LIKE :datas ";
$query_qnt_radiocolar_lobo .= " OR hora LIKE :hora ";
$query_qnt_radiocolar_lobo .= " OR classe LIKE :classe ";
$query_qnt_radiocolar_lobo .= " OR ordem LIKE :ordem ";
$query_qnt_radiocolar_lobo .= " OR familia LIKE :familia ";
$query_qnt_radiocolar_lobo .= " OR genero LIKE :genero ";
$query_qnt_radiocolar_lobo .= " OR especie LIKE :especie ";
$query_qnt_radiocolar_lobo .= " OR nome_popular LIKE :nome_popular ";
$query_qnt_radiocolar_lobo .= " OR mg LIKE :mg ";
$query_qnt_radiocolar_lobo .= " OR br LIKE :br ";
$query_qnt_radiocolar_lobo .= " OR iucn LIKE :iucn ";
$query_qnt_radiocolar_lobo .= " OR numero_ind LIKE :numero_ind ";
$query_qnt_radiocolar_lobo .= " OR regiao LIKE :regiao ";
$query_qnt_radiocolar_lobo .= " OR ponto_amostral LIKE :ponto_amostral ";
$query_qnt_radiocolar_lobo .= " OR metodologia LIKE :metodologia ";
$query_qnt_radiocolar_lobo .= " OR latitude LIKE :latitude ";
$query_qnt_radiocolar_lobo .= " OR longitude LIKE :longitude ";
$query_qnt_radiocolar_lobo .= " OR campanha LIKE :campanha ";
$query_qnt_radiocolar_lobo .= " OR consultor LIKE :consultor ";
$query_qnt_radiocolar_lobo .= " OR especialidade LIKE :especialidade ";
$query_qnt_radiocolar_lobo .= " OR empresa LIKE :empresa ";
$query_qnt_radiocolar_lobo .= " OR obs LIKE :obs ";
}

$result_qnt_radiocolar_lobo = $conn->prepare($query_qnt_radiocolar_lobo);


if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_qnt_radiocolar_lobo->bindParam(':projeto', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_radiocolar_lobo->bindParam(':individuo', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_radiocolar_lobo->bindParam(':ano', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_radiocolar_lobo->bindParam(':datas', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_radiocolar_lobo->bindParam(':hora', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_radiocolar_lobo->bindParam(':classe', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_radiocolar_lobo->bindParam(':ordem', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_radiocolar_lobo->bindParam(':familia', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_radiocolar_lobo->bindParam(':genero', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_radiocolar_lobo->bindParam(':especie', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_radiocolar_lobo->bindParam(':nome_popular', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_radiocolar_lobo->bindParam(':mg', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_radiocolar_lobo->bindParam(':br', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_radiocolar_lobo->bindParam(':iucn', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_radiocolar_lobo->bindParam(':numero_ind', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_radiocolar_lobo->bindParam(':regiao', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_radiocolar_lobo->bindParam(':ponto_amostral', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_radiocolar_lobo->bindParam(':metodologia', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_radiocolar_lobo->bindParam(':latitude', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_radiocolar_lobo->bindParam(':longitude', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_radiocolar_lobo->bindParam(':campanha', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_radiocolar_lobo->bindParam(':consultor', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_radiocolar_lobo->bindParam(':especialidade', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_radiocolar_lobo->bindParam(':empresa', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_radiocolar_lobo->bindParam(':obs', $valor_pesq, PDO::PARAM_STR);
}

//execute

$result_qnt_radiocolar_lobo->execute();
$row_qnt_radiocolar_lobo = $result_qnt_radiocolar_lobo->fetch(PDO::FETCH_ASSOC);

//var_dump($row_qnt_radiocolar_lobo);

//var_dump($row_qnt_radiocolar_lobo);

//Recuperar os registros do banco de dados
$query_radiocolar_lobo = "SELECT projeto, individuo, ano, datas, hora, classe, ordem, familia, genero, especie, nome_popular, mg, br, iucn, numero_ind, regiao, ponto_amostral, metodologia, latitude, longitude, campanha, consultor, especialidade, empresa, obs 
                    FROM radiocolar_lobo"; 

if (!empty($dados_requisicao['search']['value']))  {
$query_radiocolar_lobo .= " WHERE projeto LIKE :projeto ";
$query_radiocolar_lobo .= " OR individuo LIKE :individuo ";
$query_radiocolar_lobo .= " OR ano LIKE :ano ";
$query_radiocolar_lobo .= " OR datas LIKE :datas ";
$query_radiocolar_lobo .= " OR hora LIKE :hora ";
$query_radiocolar_lobo .= " OR classe LIKE :classe ";
$query_radiocolar_lobo .= " OR ordem LIKE :ordem ";
$query_radiocolar_lobo .= " OR familia LIKE :familia ";
$query_radiocolar_lobo .= " OR genero LIKE :genero ";
$query_radiocolar_lobo .= " OR especie LIKE :especie ";
$query_radiocolar_lobo .= " OR nome_popular LIKE :nome_popular ";
$query_radiocolar_lobo .= " OR mg LIKE :mg ";
$query_radiocolar_lobo .= " OR br LIKE :br ";
$query_radiocolar_lobo .= " OR iucn LIKE :iucn ";
$query_radiocolar_lobo .= " OR numero_ind LIKE :numero_ind ";
$query_radiocolar_lobo .= " OR regiao LIKE :regiao ";
$query_radiocolar_lobo .= " OR ponto_amostral LIKE :ponto_amostral ";
$query_radiocolar_lobo .= " OR metodologia LIKE :metodologia ";
$query_radiocolar_lobo .= " OR latitude LIKE :latitude ";
$query_radiocolar_lobo .= " OR longitude LIKE :longitude ";
$query_radiocolar_lobo .= " OR campanha LIKE :campanha ";
$query_radiocolar_lobo .= " OR consultor LIKE :consultor ";
$query_radiocolar_lobo .= " OR especialidade LIKE :especialidade ";
$query_radiocolar_lobo .= " OR empresa LIKE :empresa ";
$query_radiocolar_lobo .= " OR obs LIKE :obs ";

}


//ordenar os registros  
$query_radiocolar_lobo .= " ORDER BY " . $colunas[$dados_requisicao['order'][0]['column']] . " " . $dados_requisicao['order'][0]['dir'] . " LIMIT :inicio , :quantidade";                    

//preparar a query
$result_radiocolar_lobo = $conn->prepare($query_radiocolar_lobo);
$result_radiocolar_lobo = $conn ->prepare($query_radiocolar_lobo);
$result_radiocolar_lobo -> bindparam (":inicio",$dados_requisicao['start'], PDO::PARAM_INT);
$result_radiocolar_lobo -> bindparam (":quantidade",$dados_requisicao['length'], PDO::PARAM_INT);

//utilizando os parametros query de pesquisa qdo valor é digitado no campo de pesquisa
if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_radiocolar_lobo->bindParam(':projeto', $valor_pesq, PDO::PARAM_STR);
    $result_radiocolar_lobo->bindParam(':individuo', $valor_pesq, PDO::PARAM_STR);
    $result_radiocolar_lobo->bindParam(':ano', $valor_pesq, PDO::PARAM_STR);
    $result_radiocolar_lobo->bindParam(':datas', $valor_pesq, PDO::PARAM_STR);
    $result_radiocolar_lobo->bindParam(':hora', $valor_pesq, PDO::PARAM_STR);
    $result_radiocolar_lobo->bindParam(':classe', $valor_pesq, PDO::PARAM_STR);
    $result_radiocolar_lobo->bindParam(':ordem', $valor_pesq, PDO::PARAM_STR);
    $result_radiocolar_lobo->bindParam(':familia', $valor_pesq, PDO::PARAM_STR);
    $result_radiocolar_lobo->bindParam(':genero', $valor_pesq, PDO::PARAM_STR);
    $result_radiocolar_lobo->bindParam(':especie', $valor_pesq, PDO::PARAM_STR);
    $result_radiocolar_lobo->bindParam(':nome_popular', $valor_pesq, PDO::PARAM_STR);
    $result_radiocolar_lobo->bindParam(':mg', $valor_pesq, PDO::PARAM_STR);
    $result_radiocolar_lobo->bindParam(':br', $valor_pesq, PDO::PARAM_STR);
    $result_radiocolar_lobo->bindParam(':iucn', $valor_pesq, PDO::PARAM_STR);
    $result_radiocolar_lobo->bindParam(':numero_ind', $valor_pesq, PDO::PARAM_STR);
    $result_radiocolar_lobo->bindParam(':regiao', $valor_pesq, PDO::PARAM_STR);
    $result_radiocolar_lobo->bindParam(':ponto_amostral', $valor_pesq, PDO::PARAM_STR);
    $result_radiocolar_lobo->bindParam(':metodologia', $valor_pesq, PDO::PARAM_STR);
    $result_radiocolar_lobo->bindParam(':latitude', $valor_pesq, PDO::PARAM_STR);
    $result_radiocolar_lobo->bindParam(':longitude', $valor_pesq, PDO::PARAM_STR);
    $result_radiocolar_lobo->bindParam(':campanha', $valor_pesq, PDO::PARAM_STR);
    $result_radiocolar_lobo->bindParam(':consultor', $valor_pesq, PDO::PARAM_STR);
    $result_radiocolar_lobo->bindParam(':especialidade', $valor_pesq, PDO::PARAM_STR);
    $result_radiocolar_lobo->bindParam(':empresa', $valor_pesq, PDO::PARAM_STR);
    $result_radiocolar_lobo->bindParam(':obs', $valor_pesq, PDO::PARAM_STR);
}


//executar a query
$result_radiocolar_lobo->execute();


//var_dump($result_radiocolar_lobo);

while($row_radiocolar_lobo = $result_radiocolar_lobo->fetch(PDO::FETCH_ASSOC)){
      extract($row_radiocolar_lobo);
    $registro = [];
    $registro [] = $projeto;
    $registro [] = $individuo;
    $registro [] = $ano;
    $registro [] = $datas;
    $registro [] = $hora;
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
    "recordsTotal" => intval($row_qnt_radiocolar_lobo['qnt_indiv']),
    "recordsFiltered" => intval ($row_qnt_radiocolar_lobo['qnt_indiv']),
    "data" => $dados
];


echo json_encode($resultados); 