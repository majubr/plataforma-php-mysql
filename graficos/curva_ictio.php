<?php
// Conexão com o banco de dados
$servername = "localhost";  // substitua pelo nome do seu servidor
$username = "root"; // substitua pelo nome do seu usuário
$password = "";   // substitua pela sua senha
$dbname = "fauna";         // substitua pelo nome do seu banco de dados

// Cria a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se houve algum erro na conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Consulta para obter os dados da tabela ictiofauna
$sql = "SELECT especie, COUNT(*) AS quantidade FROM ictiofauna GROUP BY especie";
$result = $conn->query($sql);

// Array para armazenar os dados
$data = array();

// Verifica se a consulta retornou resultados
if ($result->num_rows > 0) {
    // Itera sobre os resultados da consulta
    while ($row = $result->fetch_assoc()) {
        $especie = $row["especie"];
        $quantidade = $row["quantidade"];

        // Adiciona os dados ao array
        $data[] = array("especie" => $especie, "quantidade" => $quantidade);
    }

    // Ordena o array pelo número de registros em ordem crescente
    usort($data, function($a, $b) {
        return $a["quantidade"] - $b["quantidade"];
    });

    // Calcula a curva de rarefação acumulada
    $curva_rarefacao = array();
    $total_registros_acumulados = 0;
    foreach ($data as $row) {
        $total_registros_acumulados += $row["quantidade"];
        $curva_rarefacao[] = array("especie" => $row["especie"], "registros_acumulados" => $total_registros_acumulados);
    }

    // Prepara os dados para o gráfico
    $labels = array();
    $dataPoints = array();
    foreach ($curva_rarefacao as $row) {
        $labels[] = $row["especie"];
        $dataPoints[] = $row["registros_acumulados"];
    }

    // Exibe o gráfico em HTML
    echo '<canvas id="rarefactionChart"></canvas>';
    echo '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>';
    echo '<script>';
    echo 'var ctx = document.getElementById("rarefactionChart").getContext("2d");';
    echo 'var rarefactionChart = new Chart(ctx, {';
    echo '    type: "line",';
    echo '    data: {';
    echo '        labels: ' . json_encode($labels) . ',';
    echo '        datasets: [{';
    echo '            label: "Curva de Rarefação",';
    echo '            data: ' . json_encode($dataPoints) . ',';
    echo '            borderColor: "blue",';
    echo '            borderWidth: 1';
    echo '        }]';
    echo '    },';
    echo '    options: {';
    echo '        responsive: true,';
    echo '        scales: {';
    echo '            y: {';
    echo '                beginAtZero: true';
    echo '            }';
    echo '        }';
    echo '    }';
    echo '});';
    echo '</script>';
} else {
    echo "Não foram encontrados registros na tabela ictiofauna.";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>


