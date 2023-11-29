<?php include 'conexao.php' ?>

<?php

// Incluir a conexao com o banco de dados








//Receber os dados da requisão
$dados_requisicao = $_REQUEST;

//lista de colunas na tabela


$colunas = [

    0 => 'familia',
    1 => 'genero',
    2 => 'especie',
    3 => 'nome_popular',
    4 => 'regiao',
    5 => 'lat',
    6 => 'lon',
];



// Obter a quantidade de registros no banco de dados
$query_qnt_ictiofauna = "SELECT COUNT(id) AS qnt_indiv FROM ictiofauna";
if (!empty($dados_requisicao['search']['value']))  {
$query_qnt_ictiofauna .= " WHERE familia LIKE :familia ";
$query_qnt_ictiofauna .= " OR especie LIKE :especie ";
$query_qnt_ictiofauna .= " OR nome_popular LIKE :nome_popular ";
$query_qnt_ictiofauna .= " OR regiao LIKE :regiao ";
$query_qnt_ictiofauna .= " OR lat LIKE :lat ";
$query_qnt_ictiofauna .= " OR lon LIKE :lon ";
}

$result_qnt_ictiofauna = $conn->prepare($query_qnt_ictiofauna);


if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_qnt_ictiofauna->bindParam(':familia', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':especie', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':nome_popular', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':regiao', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':lat', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_ictiofauna->bindParam(':lon', $valor_pesq, PDO::PARAM_STR);
}

//execute

$result_qnt_ictiofauna->execute();
$row_qnt_ictiofauna = $result_qnt_ictiofauna->fetch(PDO::FETCH_ASSOC);

//var_dump($row_qnt_ictiofauna);

//var_dump($row_qnt_ictiofauna);

//Recuperar os registros do banco de dados
$query_ictiofauna = "SELECT familia, especie, nome_popular, regiao, lat, lon 
                    FROM ictiofauna"; 

if (!empty($dados_requisicao['search']['value']))  {
$query_ictiofauna .= " WHERE familia LIKE :familia ";
$query_ictiofauna .= " OR especie LIKE :especie ";
$query_ictiofauna .= " OR nome_popular LIKE :nome_popular ";
$query_ictiofauna .= " OR regiao LIKE :regiao ";
$query_ictiofauna .= " OR lat LIKE :lat ";
$query_ictiofauna .= " OR lon LIKE :lon ";

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
    $result_ictiofauna->bindParam(':familia', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':especie', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':nome_popular', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':regiao', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':lat', $valor_pesq, PDO::PARAM_STR);
    $result_ictiofauna->bindParam(':lon', $valor_pesq, PDO::PARAM_STR);
}


//executar a query
$result_ictiofauna->execute();


//var_dump($result_ictiofauna);

while($row_ictiofauna = $result_ictiofauna->fetch(PDO::FETCH_ASSOC)){
      extract($row_ictiofauna);
    $registro = [];
    $registro [] = $familia;
    $registro [] = $especie;
    $registro [] = $nome_popular;
    $registro [] = $regiao;
    $registro [] = $lat;
    $registro [] = $lon;
    $registro [] =  "<a role='button' class = 'btn btn-outline-success btn-lg' href='exibicao_ictio.php?lat=$lat&lon=$lon&sp=$especie '><i class='fa-solid fa-map-location-dot'></i></a>";
    $dados[] = $registro;



}

$resultados = [
    "draw" => intval ($dados_requisicao['draw']),
    "recordsTotal" => intval($row_qnt_ictiofauna['qnt_indiv']),
    "recordsFiltered" => intval ($row_qnt_ictiofauna['qnt_indiv']),
    "data" => $dados
];


echo json_encode($resultados); 