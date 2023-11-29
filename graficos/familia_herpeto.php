<<!DOCTYPE html>
<?php include 'conexao.php'?>
<?php

$sql =  "SELECT familia, count(familia) as numero  FROM herpetofauna GROUP BY familia";
$stmt = $conn->prepare($sql);
$stmt->execute();

#chart.js - Preparando valores#

$familia = '';
$numero = '';

while ($array = $stmt->fetch(PDO::FETCH_ASSOC)) {
 $familia = $familia . '"' . $array['familia'] . '",';
	 $numero = $numero . '"' . $array['numero'] . '",';

	 $familia = trim($familia); #tira os espaços da variável
	 $numero = trim($numero);


	}

	?>
<html>
<head>
	<title></title>
			<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.2/FileSaver.min.js"></script>
</head>
<body>
	<canvas id="myChart"></canvas>


	<button name="chartValor" id="chartValor"  onclick="updateChartType()">Todos os anos</button>

	<button name="chartValor" id="chartValor"  onclick="updateChartType2()">2018</button>

	<button name="chartValor" id="chartValor"  onclick="updateChartType3()">2019</button>

	<button name="chartValor" id="chartValor"  onclick="updateChartType4()">2020</button>

	<button name="chartValor2" id="chartValor" onclick="updateChartType5()">2021</button>

	<button name="chartValor2" id="chartValor" onclick="updateChartType6()">2022</button>

	<button name="chartValor2" id="chartValor" onclick="updateChartType7()">2023</button>
	
<button onclick="exportChart('myChart')">Exportar como JPG</button>
<button onclick="exportChart('myChart', 'image/jpeg')">Exportar como JPEG</button>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
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
    type: 'bar',

    // The data for our dataset
   
        // here we destroy/delete the old or previous chart and redraw it again
               	
    data:  {
					labels:[<?php echo $familia; ?>],
					datasets:
					[{
						label:'Numero de registros',
						data:[<?php echo $numero; ?>],
						backgroundColor: 'rgb(0,0,0,0.5)',
						borderColor: 'rgba(0,0,0)',
						borderWidth: 3,
						position: 'left'


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
					legend: {
						display: false,
						labels: {
							fontColor: "black",
							fontSize: 18
						}
					},
					scales: {
						xAxes: [{ 
							display: true,
							
							scaleLabel: {
								display: true,
								labelString: 'Familia',
								fontColor:'	#000000',
								fontSize:16,

							},
							ticks: {
								fontColor: "black",
								fontSize: 15,
								
								
							}
						}],
						yAxes: [{
							display: true,
							scaleLabel: {
								display: true,
								labelString: 'Número de registros',
								fontColor: '#000000',
								fontSize:16
							},
							ticks: {
								fontColor: "black",
								fontSize: 20
							}

						}]
						

					}


				}

});







function updateChartType() {

	<?php

$sql =  "SELECT familia, count(familia) as numero  FROM herpetofauna GROUP BY familia";
$stmt = $conn->prepare($sql);
$stmt->execute();

#chart.js - Preparando valores#

$familia = '';
$numero = '';

while ($array = $stmt->fetch(PDO::FETCH_ASSOC)) {
 $familia = $familia . '"' . $array['familia'] . '",';
	 $numero = $numero . '"' . $array['numero'] . '",';

	 $familia = trim($familia); #tira os espaços da variável
	 $numero = trim($numero);


	}

	?>
	

if (document.getElementById('chartValor').value = 'Todos os anos') 
   
		var ctx = document.getElementById('myChart').getContext('2d');
		var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
   
        // here we destroy/delete the old or previous chart and redraw it again
               	
    data:  {
					labels:[<?php echo $familia; ?>],
					datasets:
					[{
						label:'Numero de registros',
						data:[<?php echo $numero; ?>],
						backgroundColor: 'rgb(0,0,0,0.5)',
						borderColor: 'rgba(0,0,0)',
						borderWidth: 3,
						position: 'left'


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
					legend: {
						display: false,
						labels: {
							fontColor: "black",
							fontSize: 18
						}
					},
					scales: {
						xAxes: [{ 
							display: true,
							
							scaleLabel: {
								display: true,
								labelString: 'Familia',
								fontColor:'	#000000',
								fontSize:16,

							},
							ticks: {
								fontColor: "black",
								fontSize: 15,
								
								
							}
						}],
						yAxes: [{
							display: true,
							scaleLabel: {
								display: true,
								labelString: 'Número de registros',
								fontColor: '#000000',
								fontSize:16
							},
							ticks: {
								fontColor: "black",
								fontSize: 20
							}

						}]
						

					}


				}

});

	}



function updateChartType2() {

	<?php

$sql =  "SELECT familia, count(familia) as numero  FROM herpetofauna WHERE ano='2018' GROUP BY familia";
$stmt = $conn->prepare($sql);
$stmt->execute();

#chart.js - Preparando valores#

$familia = '';
$numero = '';

while ($array = $stmt->fetch(PDO::FETCH_ASSOC)) {
 $familia = $familia . '"' . $array['familia'] . '",';
	 $numero = $numero . '"' . $array['numero'] . '",';

	 $familia = trim($familia); #tira os espaços da variável
	 $numero = trim($numero);


	}

	?>
	

if (document.getElementById('chartValor').value = '2018') 
   
		var ctx = document.getElementById('myChart').getContext('2d');
		var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
   
        // here we destroy/delete the old or previous chart and redraw it again
               	
    data:  {
					labels:[<?php echo $familia; ?>],
					datasets:
					[{
						label:'Numero de registros',
						data:[<?php echo $numero; ?>],
						backgroundColor: 'rgb(0,0,0,0.5)',
						borderColor: 'rgba(0,0,0)',
						borderWidth: 3,
						position: 'left'


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
					legend: {
						display: false,
						labels: {
							fontColor: "black",
							fontSize: 18
						}
					},
					scales: {
						xAxes: [{ 
							display: true,
							
							scaleLabel: {
								display: true,
								labelString: 'Familia',
								fontColor:'	#000000',
								fontSize:16,

							},
							ticks: {
								fontColor: "black",
								fontSize: 15,
								
								
							}
						}],
						yAxes: [{
							display: true,
							scaleLabel: {
								display: true,
								labelString: 'Número de registros',
								fontColor: '#000000',
								fontSize:16
							},
							ticks: {
								fontColor: "black",
								fontSize: 20
							}

						}]
						

					}


				}

});

	}

function updateChartType3() {

	<?php

$sql =  "SELECT familia, count(familia) as numero  FROM herpetofauna WHERE ano='2019' GROUP BY familia";
$stmt = $conn->prepare($sql);
$stmt->execute();

#chart.js - Preparando valores#

$familia = '';
$numero = '';

while ($array = $stmt->fetch(PDO::FETCH_ASSOC)) {
 $familia = $familia . '"' . $array['familia'] . '",';
	 $numero = $numero . '"' . $array['numero'] . '",';

	 $familia = trim($familia); #tira os espaços da variável
	 $numero = trim($numero);


	}

	?>
	

if (document.getElementById('chartValor').value = '2019') 
   
		var ctx = document.getElementById('myChart').getContext('2d');
		var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
   
        // here we destroy/delete the old or previous chart and redraw it again
               	
    data:  {
					labels:[<?php echo $familia; ?>],
					datasets:
					[{
						label:'Numero de registros',
						data:[<?php echo $numero; ?>],
						backgroundColor: 'rgb(0,0,0,0.5)',
						borderColor: 'rgba(0,0,0)',
						borderWidth: 3,
						position: 'left'


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
					legend: {
						display: false,
						labels: {
							fontColor: "black",
							fontSize: 18
						}
					},
					scales: {
						xAxes: [{ 
							display: true,
							
							scaleLabel: {
								display: true,
								labelString: 'Familia',
								fontColor:'	#000000',
								fontSize:16,

							},
							ticks: {
								fontColor: "black",
								fontSize: 15,
								
								
							}
						}],
						yAxes: [{
							display: true,
							scaleLabel: {
								display: true,
								labelString: 'Número de registros',
								fontColor: '#000000',
								fontSize:16
							},
							ticks: {
								fontColor: "black",
								fontSize: 20
							}

						}]
						

					}


				}

});

	}

function updateChartType4() {

	<?php
$sql =  "SELECT familia, count(familia) as numero  FROM herpetofauna WHERE ano='2020' GROUP BY familia";
$stmt = $conn->prepare($sql);
$stmt->execute();

#chart.js - Preparando valores#

$familia = '';
$numero = '';

while ($array = $stmt->fetch(PDO::FETCH_ASSOC)) {
 $familia = $familia . '"' . $array['familia'] . '",';
	 $numero = $numero . '"' . $array['numero'] . '",';

	 $familia = trim($familia); #tira os espaços da variável
	 $numero = trim($numero);


	}

	?>
	

if (document.getElementById('chartValor').value = '2020') 
   
		var ctx = document.getElementById('myChart').getContext('2d');
		var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
   
        // here we destroy/delete the old or previous chart and redraw it again
               	
    data:  {
					labels:[<?php echo $familia; ?>],
					datasets:
					[{
						label:'Numero de registros',
						data:[<?php echo $numero; ?>],
						backgroundColor: 'rgb(0,0,0,0.5)',
						borderColor: 'rgba(0,0,0)',
						borderWidth: 3,
						position: 'left'


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
					legend: {
						display: false,
						labels: {
							fontColor: "black",
							fontSize: 18
						}
					},
					scales: {
						xAxes: [{ 
							display: true,
							
							scaleLabel: {
								display: true,
								labelString: 'Familia',
								fontColor:'	#000000',
								fontSize:16,

							},
							ticks: {
								fontColor: "black",
								fontSize: 15,
								
								
							}
						}],
						yAxes: [{
							display: true,
							scaleLabel: {
								display: true,
								labelString: 'Número de registros',
								fontColor: '#000000',
								fontSize:16
							},
							ticks: {
								fontColor: "black",
								fontSize: 20
							}

						}]
						

					}


				}

});

	}

	function updateChartType5() {
			<?php
$sql =  "SELECT familia, count(familia) as numero  FROM herpetofauna WHERE ano='2021' GROUP BY familia";
$stmt = $conn->prepare($sql);
$stmt->execute();

#chart.js - Preparando valores#

$familia = '';
$numero = '';

while ($array = $stmt->fetch(PDO::FETCH_ASSOC)) {
 $familia = $familia . '"' . $array['familia'] . '",';
	 $numero = $numero . '"' . $array['numero'] . '",';

	 $familia = trim($familia); #tira os espaços da variável
	 $numero = trim($numero);


	}

	?>
		
		if (document.getElementById('chartValor').value = '2021') 
   
	var ctx = document.getElementById('myChart').getContext('2d');
		var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
   
        // here we destroy/delete the old or previous chart and redraw it again
               	
    data:  {
					labels:[<?php echo $familia; ?>],
					datasets:
					[{
						label:'Numero de registros',
						data:[<?php echo $numero; ?>],
						backgroundColor: 'rgb(0,0,0,0.5)',
						borderColor: 'rgba(0,0,0)',
						borderWidth: 3,
						position: 'left'


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
					legend: {
						display: false,
						labels: {
							fontColor: "black",
							fontSize: 18
						}
					},
					scales: {
						xAxes: [{ 
							display: true,
							
							scaleLabel: {
								display: true,
								labelString: 'Familia',
								fontColor:'	#000000',
								fontSize:16,

							},
							ticks: {
								fontColor: "black",
								fontSize: 15,
								
								
							}
						}],
						yAxes: [{
							display: true,
							scaleLabel: {
								display: true,
								labelString: 'Número de registros',
								fontColor: '#000000',
								fontSize:16
							},
							ticks: {
								fontColor: "black",
								fontSize: 20
							}

						}]
						

					}


				}

});
}

function updateChartType6() {
			<?php

$sql =  "SELECT familia, count(familia) as numero  FROM herpetofauna WHERE ano='2022' GROUP BY familia";
$stmt = $conn->prepare($sql);
$stmt->execute();

#chart.js - Preparando valores#

$familia = '';
$numero = '';

while ($array = $stmt->fetch(PDO::FETCH_ASSOC)) {
 $familia = $familia . '"' . $array['familia'] . '",';
	 $numero = $numero . '"' . $array['numero'] . '",';

	 $familia = trim($familia); #tira os espaços da variável
	 $numero = trim($numero);


	}

	?>
		
		if (document.getElementById('chartValor').value = '2021') 
   
	var ctx = document.getElementById('myChart').getContext('2d');
		var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
   
        // here we destroy/delete the old or previous chart and redraw it again
               	
    data:  {
					labels:[<?php echo $familia; ?>],
					datasets:
					[{
						label:'Numero de registros',
						data:[<?php echo $numero; ?>],
						backgroundColor: 'rgb(0,0,0,0.5)',
						borderColor: 'rgba(0,0,0)',
						borderWidth: 3,
						position: 'left'


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
					legend: {
						display: false,
						labels: {
							fontColor: "black",
							fontSize: 18
						}
					},
					scales: {
						xAxes: [{ 
							display: true,
							
							scaleLabel: {
								display: true,
								labelString: 'Familia',
								fontColor:'	#000000',
								fontSize:16,

							},
							ticks: {
								fontColor: "black",
								fontSize: 15,
								
								
							}
						}],
						yAxes: [{
							display: true,
							scaleLabel: {
								display: true,
								labelString: 'Número de registros',
								fontColor: '#000000',
								fontSize:16
							},
							ticks: {
								fontColor: "black",
								fontSize: 20
							}

						}]
						

					}


				}

});

}
		function updateChartType7() {
			<?php

$sql =  "SELECT familia, count(familia) as numero  FROM herpetofauna WHERE ano='2023' GROUP BY familia";
$stmt = $conn->prepare($sql);
$stmt->execute();

#chart.js - Preparando valores#

$familia = '';
$numero = '';

while ($array = $stmt->fetch(PDO::FETCH_ASSOC)) {
 $familia = $familia . '"' . $array['familia'] . '",';
	 $numero = $numero . '"' . $array['numero'] . '",';

	 $familia = trim($familia); #tira os espaços da variável
	 $numero = trim($numero);


	}

	?>
		
		if (document.getElementById('chartValor').value = '2023') 
   
	var ctx = document.getElementById('myChart').getContext('2d');
		var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
   
        // here we destroy/delete the old or previous chart and redraw it again
               	
    data:  {
					labels:[<?php echo $familia; ?>],
					datasets:
					[{
						label:'Numero de registros',
						data:[<?php echo $numero; ?>],
						backgroundColor: 'rgb(0,0,0,0.5)',
						borderColor: 'rgba(0,0,0)',
						borderWidth: 3,
						position: 'left'


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
					legend: {
						display: false,
						labels: {
							fontColor: "black",
							fontSize: 18
						}
					},
					scales: {
						xAxes: [{ 
							display: true,
							
							scaleLabel: {
								display: true,
								labelString: 'Familia',
								fontColor:'	#000000',
								fontSize:16,

							},
							ticks: {
								fontColor: "black",
								fontSize: 15,
								
								
							}
						}],
						yAxes: [{
							display: true,
							scaleLabel: {
								display: true,
								labelString: 'Número de registros',
								fontColor: '#000000',
								fontSize:16
							},
							ticks: {
								fontColor: "black",
								fontSize: 20
							}

						}]
						

					}


				}

});
}
</script>

</body>
</html>