<!DOCTYPE html>
<?php include 'conexao.php'?>
<?php

$sql =  "SELECT campanha, count(campanha) as numero  FROM mastofauna GROUP BY campanha";
$stmt = $conn->prepare($sql);
$stmt->execute();

#chart.js - Preparando valores#

$campanha = '';
$numero = '';

while ($array = $stmt->fetch(PDO::FETCH_ASSOC)) {
 $campanha = $campanha . '"' . $array['campanha'] . '",';
	 $numero = $numero . '"' . $array['numero'] . '",';

	 $campanha = trim($campanha); #tira os espaços da variável
	 $numero = trim($numero);


	}

	?>
<html>
<head>
	<title></title>
</head>
<body>
	<canvas id="myChart"></canvas>
	


  <button onclick="exportChart('myChart')">Exportar como JPG</button>
  <button onclick="exportChart('myChart', 'image/jpeg')">Exportar como JPEG</button>

  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.0"></script>
  <script src="https://cdn.jsdelivr.net/npm/file-saver@2.0.5"></script>
  <script type="text/javascript">
    function exportChart(chartId, format = 'image/jpg') {
      // Obter o elemento do gráfico
      var chartElement = document.getElementById(chartId);

      // Usar html2canvas para converter o gráfico em uma imagem
      html2canvas(chartElement).then(function(canvas) {
        // Converter o canvas em blob
        canvas.toBlob(function(blob) {
          // Usar o FileSaver.js para fazer o download da imagem
          saveAs(blob, 'chart.' + format.split('/')[1]);
        }, format);
      });
    }

		var ctx = document.getElementById('myChart').getContext('2d');
		var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
   
        // here we destroy/delete the old or previous chart and redraw it again
               	
    data:  {
					labels:[<?php echo $campanha; ?>],
					datasets:
					[{
						label:'Numero de registros',
						data:[<?php echo $numero; ?>],
						borderColor: 'rgb(50,205,50,0.5)',
      					backgroundColor: 'transparent',
      					pointStyle: 'circle',
      					pointRadius: 10,
      					pointHoverRadius: 40,


					}]

				},
	
      
    
   
 
    // Configuration options go here
   options: { 
    tooltips: {
    enabled: false // Disable tooltips on hover
  },
  hover: {
    mode: null // Disable hover mode
  },
  onClick: function(e) {
    e.stop(); // Prevent click interactions
  },
  events: [],
    	scales: {scales:{yAxes: [{beginAtZero: false}], xAxes : [{autoskip: true, maxTicketsLimit: 20 }]}},
    	tooltips: {mode: 'index'},
    	legend:{display: true,position: 'top', labels:{fontColor: 'rgb(0,0,0)',fontSize: 16}}
    }

});


</script>

</body>
</html>
