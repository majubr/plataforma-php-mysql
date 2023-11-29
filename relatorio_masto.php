<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#sombra {
			-webkit-box-shadow: 6px 9px 7px 0px rgba(176,176,176,0.75);
			-moz-box-shadow: 6px 9px 7px 0px rgba(176,176,176,0.75);
			box-shadow: 6px 9px 7px 0px rgba(176,176,176,0.75);
		}


	</style>
</head>





<body >
<br>
<p class="display-5 mb-4" style="font-size: 30px"> Lista resumida de espécies da mastofauna </p>
 




<table class="table">
	<form action="" method="POST" class="mb-3">
  <div class="input-group">
    <div class="col-md-3">
		<input type="text" name="search" class="form-control" placeholder="Pesquisa por nome da espécie">
    </div>
    <div class="col-md-3">
      <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
  </div>
</form>
  <thead>
    <tr>
      <th scope="col">Família</th>
      <th scope="col">Espécie</th>
      <th scope="col">Número total de registros</th>
      <th scope="col">Metodologia</th>   
      <th scope="col">Região</th>
      <th scope="col">Ponto Amostral</th> 
    </tr>
  </thead>


		<?php
			$conn = new mysqli("localhost", "root", "", "fauna");
      $searchTerm = isset($_POST['search']) ? $_POST['search'] : '';
			$sql = "SELECT distinct(especie), familia, count(numero_ind) as total, regiao, metodologia, ponto_amostral FROM mastofauna WHERE especie LIKE '%$searchTerm%' GROUP BY especie"; 
			$busca = mysqli_query($conn,$sql);
			while ($array =  mysqli_fetch_array($busca)){

				$familia = $array['familia'];
				$especie = $array['especie'];
				$total = $array['total'];
				$metodologia = $array['metodologia'];
				$regiao = $array['regiao'];
				$ponto_amostral = $array['ponto_amostral'];
		?>
	<tr>	
      	<td><?php echo $familia ?></td>
	  	<td> <i> <?php echo $especie ?> </i></td>
	  	<td> <?php echo $total ?> </td>
	  	<td> <?php echo $regiao ?> </td>
	  	<td> <?php echo $ponto_amostral ?> </td>
	  		
				<?php } ?>
			
    </tr>
 <script type="text/javascript">
 	function updateChartType() {

	<?php

$conexao = new mysqli("localhost", "root", "", "fauna");


$sql =  "SELECT especie, count(especie) as numero FROM mastofauna GROUP BY especie";
$buscar = mysqli_query($conexao,$sql);

#chart.js - Preparando valores#

$especie = '';
$numero = '';

while ($dados = mysqli_fetch_array($buscar)) {
 $especie = $especie . '"' . $dados['especie'] . '",';
	 $numero = $numero . '"' . $dados['numero'] . '",';

	 $especie = trim($especie); #tira os espaços da variável
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
					labels:[<?php echo $especie; ?>],
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
								labelString: 'Espécies',
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
</table>


</body>

</html>