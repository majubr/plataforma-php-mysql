<?php include  'conexao.php' ?>

<?php  
// export.php
if(isset($_POST["exportar"]))  
{  
     
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=data.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array('id', 'projeto', 'municipio', 'ano', 'datas', 'estacao', 'classe', 'ordem', 'familia', 'genero', 'especie', 'mg', 'br', 'iucn', 'nome_popular', 'numero_ind', 'regiao', 'ponto_amostral', 'metodologia', 'latitude', 'longitude', 'campanha', 'consultor', 'especialidade', 'empresa', 'obs'), ";"); 
    $query = "SELECT * from avifauna ORDER BY id DESC";  
    $result = mysqli_query($conn, $query);  
    while($row = mysqli_fetch_assoc($result))  
    {  
        $encoded_row = array_map(function($item) {
            return utf8_decode($item);
        }, $row);
        fputcsv($output, $encoded_row, ";"); // Delimitador definido como ";" para evitar problemas de caracteres
    }  
    fclose($output);  
}  
?> 