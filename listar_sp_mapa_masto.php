<?php  include 'conexao.php' ?>
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
$query_qnt_mastofauna = "SELECT COUNT(id) AS qnt_indiv FROM mastofauna";
if (!empty($dados_requisicao['search']['value']))  {
$query_qnt_mastofauna .= " WHERE familia LIKE :familia ";
$query_qnt_mastofauna .= " OR especie LIKE :especie ";
$query_qnt_mastofauna .= " OR nome_popular LIKE :nome_popular ";
$query_qnt_mastofauna .= " OR regiao LIKE :regiao ";
$query_qnt_mastofauna .= " OR lat LIKE :lat ";
$query_qnt_mastofauna .= " OR lon LIKE :lon ";
}

$result_qnt_mastofauna = $conn->prepare($query_qnt_mastofauna);


if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_qnt_mastofauna->bindParam(':familia', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':especie', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':nome_popular', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':regiao', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':lat', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_mastofauna->bindParam(':lon', $valor_pesq, PDO::PARAM_STR);
}

//execute

$result_qnt_mastofauna->execute();
$row_qnt_mastofauna = $result_qnt_mastofauna->fetch(PDO::FETCH_ASSOC);

//var_dump($row_qnt_mastofauna);

//var_dump($row_qnt_mastofauna);

//Recuperar os registros do banco de dados
$query_mastofauna = "SELECT familia, especie, nome_popular, regiao, lat, lon 
                    FROM mastofauna"; 

if (!empty($dados_requisicao['search']['value']))  {
$query_mastofauna .= " WHERE familia LIKE :familia ";
$query_mastofauna .= " OR especie LIKE :especie ";
$query_mastofauna .= " OR nome_popular LIKE :nome_popular ";
$query_mastofauna .= " OR regiao LIKE :regiao ";
$query_mastofauna .= " OR lat LIKE :lat ";
$query_mastofauna .= " OR lon LIKE :lon ";

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
    $result_mastofauna->bindParam(':familia', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':especie', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':nome_popular', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':regiao', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':lat', $valor_pesq, PDO::PARAM_STR);
    $result_mastofauna->bindParam(':lon', $valor_pesq, PDO::PARAM_STR);
}


//executar a query
$result_mastofauna->execute();


//var_dump($result_mastofauna);

while($row_mastofauna = $result_mastofauna->fetch(PDO::FETCH_ASSOC)){
      extract($row_mastofauna);
    $registro = [];
    $registro [] = $familia;
    $registro [] = $especie;
    $registro [] = $nome_popular;
    $registro [] = $regiao;
    $registro [] = $lat;
    $registro [] = $lon;
    $registro [] =  "<a role='button' class = 'btn btn-outline-success btn-lg' href='exibicao_masto.php?lat=$lat&lon=$lon&sp=$especie '><i class='fa-solid fa-map-location-dot'></i></a>";
    $dados[] = $registro;



}

$resultados = [
    "draw" => intval ($dados_requisicao['draw']),
    "recordsTotal" => intval($row_qnt_mastofauna['qnt_indiv']),
    "recordsFiltered" => intval ($row_qnt_mastofauna['qnt_indiv']),
    "data" => $dados
];


echo json_encode($resultados);  