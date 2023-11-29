<?php include 'conexao.php'  ?>

<?php


// Verifica se houve erro na conexão
if ($conn->connect_error) {
  die("Falha na conexão: " . $conn->connect_error);
}

// Query para inserir dados na tabela resgate
$sql_insert = "INSERT INTO resgate (projeto, municipio, ano, datas, estacao, classe, ordem, familia, genero, especie, nome_popular, mg, br, iucn, numero_ind, regiao, ponto_amostral, metodologia, latitude, longitude, campanha, consultor, especialidade, empresa, obs, lat, lon)
SELECT 'NA' as projeto, dw.municipality as municipio, 0000 as ano, dw.eventDate as datas, 'NA' as estacao, oc.class as classe, oc.order_ as ordem, oc.family as familia, 'NA' as genero, oc.scientificName as especie, 'NA' as nome_popular, 'NA' as mg, 'NA' as br, 'NA' as iucn, 
oc.individualCount as numero_ind, 'NA' as regiao, 'NA' as ponto_amostral, dw.samplingProtocol as metodologia, dw.decimalLatitude as latitude, dw.decimalLongitude as longitude, 'NA' as campanha, oc.recordedBy as consultor, 'NA' as especialidade, 'NA' as empresa, 'NA' as obs, 00 as lat, 00 as lon
FROM dw_oc_resgate_conversao oc INNER JOIN dw_resgate_conversao dw ON dw.eventID = oc.eventID";

// Prepara a query de inserção
$stmt = $conn->prepare($sql_insert);

// Verifica se houve erro na preparação da query
if ($stmt === false) {
  echo "Erro ao preparar a query de inserção: " . $conn->error;
  exit;
}

// Executa a query de inserção
if ($stmt->execute() === TRUE) {
  // Query para deletar os dados nas tabelas dw_oc_resgate_conversao e dw_resgate_conversao
  $sql_delete = "DELETE FROM dw_oc_resgate_conversao; DELETE FROM dw_resgate_conversao;";
  
  // Executa a query de exclusão
  if ($conn->multi_query($sql_delete) === TRUE) {
    echo "Dados inseridos e tabelas dw_oc_resgate_conversao e dw_resgate_conversao limpas com sucesso!";
  } else {
    echo "Erro ao limpar tabelas: " . $conn->error;
  }
} else {
  echo "Erro ao inserir dados: " . $stmt->error;
}

// Fecha a conexão com o banco de dados
$stmt->close();
$conn->close();
?>
