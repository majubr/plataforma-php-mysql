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

    0 => 'familia',
    1 => 'genero',
    2 => 'especie',
    3 => 'nome_popular',
    4 => 'regiao',
    5 => 'lat',
    6 => 'lon',
];



// Obter a quantidade de registros no banco de dados
$query_qnt_herpetofauna = "SELECT COUNT(id) AS qnt_indiv FROM herpetofauna";
if (!empty($dados_requisicao['search']['value']))  {
$query_qnt_herpetofauna .= " WHERE familia LIKE :familia ";
$query_qnt_herpetofauna .= " OR especie LIKE :especie ";
$query_qnt_herpetofauna .= " OR nome_popular LIKE :nome_popular ";
$query_qnt_herpetofauna .= " OR regiao LIKE :regiao ";
$query_qnt_herpetofauna .= " OR lat LIKE :lat ";
$query_qnt_herpetofauna .= " OR lon LIKE :lon ";
}

$result_qnt_herpetofauna = $conn->prepare($query_qnt_herpetofauna);


if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_qnt_herpetofauna->bindParam(':familia', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':especie', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':nome_popular', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':regiao', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':lat', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_herpetofauna->bindParam(':lon', $valor_pesq, PDO::PARAM_STR);
}

//execute

$result_qnt_herpetofauna->execute();
$row_qnt_herpetofauna = $result_qnt_herpetofauna->fetch(PDO::FETCH_ASSOC);

//var_dump($row_qnt_herpetofauna);

//var_dump($row_qnt_herpetofauna);

//Recuperar os registros do banco de dados
$query_herpetofauna = "SELECT familia, especie, nome_popular, regiao, lat, lon 
                    FROM herpetofauna"; 

if (!empty($dados_requisicao['search']['value']))  {
$query_herpetofauna .= " WHERE familia LIKE :familia ";
$query_herpetofauna .= " OR especie LIKE :especie ";
$query_herpetofauna .= " OR nome_popular LIKE :nome_popular ";
$query_herpetofauna .= " OR regiao LIKE :regiao ";
$query_herpetofauna .= " OR lat LIKE :lat ";
$query_herpetofauna .= " OR lon LIKE :lon ";

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
    $result_herpetofauna->bindParam(':familia', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':especie', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':nome_popular', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':regiao', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':lat', $valor_pesq, PDO::PARAM_STR);
    $result_herpetofauna->bindParam(':lon', $valor_pesq, PDO::PARAM_STR);
}


//executar a query
$result_herpetofauna->execute();


//var_dump($result_herpetofauna);

while($row_herpetofauna = $result_herpetofauna->fetch(PDO::FETCH_ASSOC)){
      extract($row_herpetofauna);
    $registro = [];
    $registro [] = $familia;
    $registro [] = $especie;
    $registro [] = $nome_popular;
    $registro [] = $regiao;
    $registro [] = $lat;
    $registro [] = $lon;
    $registro [] =  "<a role='button' class = 'btn btn-outline-success btn-lg' href='exibicao_herpeto.php?lat=$lat&lon=$lon&sp=$especie '><i class='fa-solid fa-map-location-dot'></i></a>";
    $dados[] = $registro;



}

$resultados = [
    "draw" => intval ($dados_requisicao['draw']),
    "recordsTotal" => intval($row_qnt_herpetofauna['qnt_indiv']),
    "recordsFiltered" => intval ($row_qnt_herpetofauna['qnt_indiv']),
    "data" => $dados
];


echo json_encode($resultados);  