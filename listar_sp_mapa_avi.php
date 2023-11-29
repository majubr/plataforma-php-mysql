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
$query_qnt_avifauna = "SELECT COUNT(id) AS qnt_indiv FROM avifauna";
if (!empty($dados_requisicao['search']['value']))  {
$query_qnt_avifauna .= " WHERE familia LIKE :familia ";
$query_qnt_avifauna .= " OR especie LIKE :especie ";
$query_qnt_avifauna .= " OR nome_popular LIKE :nome_popular ";
$query_qnt_avifauna .= " OR regiao LIKE :regiao ";
$query_qnt_avifauna .= " OR lat LIKE :lat ";
$query_qnt_avifauna .= " OR lon LIKE :lon ";
}

$result_qnt_avifauna = $conn->prepare($query_qnt_avifauna);


if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_qnt_avifauna->bindParam(':familia', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':especie', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':nome_popular', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':regiao', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':lat', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_avifauna->bindParam(':lon', $valor_pesq, PDO::PARAM_STR);
}

//execute

$result_qnt_avifauna->execute();
$row_qnt_avifauna = $result_qnt_avifauna->fetch(PDO::FETCH_ASSOC);

//var_dump($row_qnt_avifauna);

//var_dump($row_qnt_avifauna);

//Recuperar os registros do banco de dados
$query_avifauna = "SELECT familia, especie, nome_popular, regiao, lat, lon 
                    FROM avifauna"; 

if (!empty($dados_requisicao['search']['value']))  {
$query_avifauna .= " WHERE familia LIKE :familia ";
$query_avifauna .= " OR especie LIKE :especie ";
$query_avifauna .= " OR nome_popular LIKE :nome_popular ";
$query_avifauna .= " OR regiao LIKE :regiao ";
$query_avifauna .= " OR lat LIKE :lat ";
$query_avifauna .= " OR lon LIKE :lon ";

}


//ordenar os registros  
$query_avifauna .= " ORDER BY " . $colunas[$dados_requisicao['order'][0]['column']] . " " . $dados_requisicao['order'][0]['dir'] . " LIMIT :inicio , :quantidade";                    

//preparar a query
$result_avifauna = $conn->prepare($query_avifauna);
$result_avifauna = $conn ->prepare($query_avifauna);
$result_avifauna -> bindparam (":inicio",$dados_requisicao['start'], PDO::PARAM_INT);
$result_avifauna -> bindparam (":quantidade",$dados_requisicao['length'], PDO::PARAM_INT);

//utilizando os parametros query de pesquisa qdo valor é digitado no campo de pesquisa
if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_avifauna->bindParam(':familia', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':especie', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':nome_popular', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':regiao', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':lat', $valor_pesq, PDO::PARAM_STR);
    $result_avifauna->bindParam(':lon', $valor_pesq, PDO::PARAM_STR);
}


//executar a query
$result_avifauna->execute();


//var_dump($result_avifauna);

while($row_avifauna = $result_avifauna->fetch(PDO::FETCH_ASSOC)){
      extract($row_avifauna);
    $registro = [];
    $registro [] = $familia;
    $registro [] = $especie;
    $registro [] = $nome_popular;
    $registro [] = $regiao;
    $registro [] = $lat;
    $registro [] = $lon;
    $registro [] =  "<a role='button' class = 'btn btn-outline-success btn-lg' href='exibicao_avi.php?lat=$lat&lon=$lon&sp=$especie '><i class='fa-solid fa-map-location-dot'></i></a>";
    $dados[] = $registro;



}

$resultados = [
    "draw" => intval ($dados_requisicao['draw']),
    "recordsTotal" => intval($row_qnt_avifauna['qnt_indiv']),
    "recordsFiltered" => intval ($row_qnt_avifauna['qnt_indiv']),
    "data" => $dados
];


echo json_encode($resultados); 