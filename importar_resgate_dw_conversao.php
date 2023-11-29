<?php include 'conexao.php'  ?>

<?php

$arquivo = $_FILES["file"]["tmp_name"];
$nome = $_FILES["file"]["name"];

$ext = explode(".", $nome);
$extensao = end($ext);

if ($extensao != "csv") {
    $mensagem = "Erro: O arquivo precisa ser um CSV.";
} else {
    $objeto = fopen($arquivo, 'r');
    $contadorInsercoes = 0;

    while (($dados = fgetcsv($objeto, 10000, ";")) !== FALSE) {
        $eventID = $dados[0];
        $samplingProtocol = $dados[1];
        $samplingEffort = $dados[2];
        $sampleSizeValue = $dados[3];
        $sampleSizeUnit = $dados[4];
        $eventDate = $dados[5];
        $eventRemarks = $dados[6];
        $county = $dados[7];
        $municipality = $dados[8];
        $waterBody = $dados[9];
        $locality = $dados[10];
        $decimalLatitude = $dados[11];
        $decimalLongitude = $dados[12];
        $geodeticDatum = $dados[13];

        $query = "INSERT INTO dw_resgate_conversao (eventID, samplingProtocol, samplingEffort, sampleSizeValue, sampleSizeUnit, eventDate, eventRemarks, county, municipality, waterBody, locality, decimalLatitude, decimalLongitude, geodeticDatum) VALUES ('$eventID','$samplingProtocol','$samplingEffort','$sampleSizeValue','$sampleSizeUnit','$eventDate','$eventRemarks','$county','$municipality','$waterBody','$locality','$decimalLatitude','$decimalLongitude','$geodeticDatum')";

        $stmt = $conn->prepare($query);
        $stmt->execute();

        $contadorInsercoes++;
    }

    if ($contadorInsercoes > 0) {
        $mensagem = "Arquivo inserido com sucesso. Total de registros inseridos: $contadorInsercoes.";
    } else {
        $mensagem = "Erro: Nenhum registro encontrado para importação.";
    }
}
?>

<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="margin-top: 40px;">
        <h3><?php echo $mensagem; ?></h3>
        <br>
        <a href="conversao_darwin_resgate.php" role="button" class="btn btn-success btn-lg">Voltar para manipulação de tabelas</a>
    </div>
</body>
</html>
>
</body>
</html>
       
