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


<?php

		include 'conexao.php'
     
?>





<body >

	  <div align="left">  
      <p class="display-5 mb-4" style="font-size: 30px"> Descrição quantitativa da tabela de valor de resgate </p>
  	  <br>
  	</div>


	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<div class="card text-white bg-secondary mb-3" style="max-width: 18rem;" id="sombra">
					<div class="card-header" align="center">Número total de registros </div>
					<div class="card-body" >
						<h5 class="card-title" style="text-align: center;font-size: 40px">
						<?php

							$sql = "SELECT SUM(numero_ind) AS total FROM resgate;";
							$stmt = $conn->prepare($sql);
								$stmt->execute();
								$row = $stmt->fetch(PDO::FETCH_ASSOC);
								$valor = $row['total'];  // Correctly assign the single value to $valor
								echo $valor;
							?>
							<span style="font-size: 30px"> registros </span></h5>

						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card text-white bg-secondary mb-3" style="max-width: 18rem;" id="sombra">
						<div class="card-header" align="center">Número total de pontos amostrados</div>
						<div class="card-body">
							<h5 class="card-title" style="text-align: center;font-size: 40px">
								<?php

								$sql = "SELECT COUNT(distinct(ponto_amostral)) AS total FROM resgate";
								$stmt = $conn->prepare($sql);
								$stmt->execute();
								$row = $stmt->fetch(PDO::FETCH_ASSOC);
$valor = $row['total'];  // Correctly assign the single value to $valor
echo $valor;

								?>

								<span style="font-size: 30px">pontos</span></h5>

							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card text-white bg-secondary mb-3" style="max-width: 18rem;" id="sombra">
							<div class="card-header" align="center">Número total de campanhas</div>
							<div class="card-body">
								<h5 class="card-title" style="text-align: center;font-size: 40px">
									<?php

									
									$sql = "SELECT COUNT(distinct(campanha)) AS total FROM resgate";
									$stmt = $conn->prepare($sql);
								$stmt->execute();
								$row = $stmt->fetch(PDO::FETCH_ASSOC);
$valor = $row['total'];  // Correctly assign the single value to $valor
echo $valor;


									?>
									<span style="font-size: 30px"> campanhas</span></h5>

								</div>
							</div>
						</div>

					</div>
				</div>

					<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<div class="card text-white bg-success mb-3" style="max-width: 18rem;" id="sombra">
					<div class="card-header" align="center">Número total de espécies </div>
					<div class="card-body" >
						<h5 class="card-title" style="text-align: center;font-size: 40px">
							<?php

							$sql = "SELECT COUNT(distinct(especie)) AS total FROM resgate";
							$stmt = $conn->prepare($sql);
							$stmt->execute();
							$row = $stmt->fetch(PDO::FETCH_ASSOC);
							$valor = $row['total'];  // Correctly assign the single value to $valor
							echo $valor;
							?>
							<span style="font-size: 30px"> espécies </span></h5>

						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card text-white bg-success mb-3" style="max-width: 18rem;" id="sombra">
						<div class="card-header" align="center">Número total de familias</div>
						<div class="card-body">
							<h5 class="card-title" style="text-align: center;font-size: 40px">
								<?php

								$sql = "SELECT COUNT(distinct(familia)) AS total FROM resgate";
								$stmt = $conn->prepare($sql);
								$stmt->execute();
								$row = $stmt->fetch(PDO::FETCH_ASSOC);
								$valor = $row['total'];  // Correctly assign the single value to $valor
								echo $valor;

								?>

								<span style="font-size: 30px"> familias </span></h5>

							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card text-white bg-success mb-3" style="max-width: 18rem;" id="sombra">
							<div class="card-header" align="center">Número total de ordens</div>
							<div class="card-body">
								<h5 class="card-title" style="text-align: center;font-size: 40px">
									<?php

									
									$sql = "SELECT COUNT(distinct(ordem)) AS total FROM resgate";
									$stmt = $conn->prepare($sql);
								$stmt->execute();
								$row = $stmt->fetch(PDO::FETCH_ASSOC);
$valor = $row['total'];  // Correctly assign the single value to $valor
echo $valor;


									?>
									<span style="font-size: 30px"> ordens</span></h5>

								</div>
							</div>
						</div>

					</div>
				</div>



		<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<div class="card text-white bg-danger mb-3" style="max-width: 18rem;" id="sombra">
					<div class="card-header" align="center">Espécies ameaçadas em MG </div>
					<div class="card-body" >
						<h5 class="card-title" style="text-align: center;font-size: 40px">
							<?php

							$sql = "SELECT COUNT(distinct(especie)) AS total FROM resgate WHERE mg != 'NA' and mg !='LC'";
							$stmt = $conn->prepare($sql);
							$stmt->execute();
							$row = $stmt->fetch(PDO::FETCH_ASSOC);
							$valor = $row['total'];  // Correctly assign the single value to $valor
							echo $valor;
							?>
							<span style="font-size: 30px"> espécies </span></h5>

						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card text-white bg-danger mb-3" style="max-width: 18rem;" id="sombra">
						<div class="card-header" align="center">Espécies ameaçadas no Brasil</div>
						<div class="card-body">
							<h5 class="card-title" style="text-align: center;font-size: 40px">
								<?php

								$sql = "SELECT COUNT(distinct(especie)) AS total FROM resgate WHERE br != 'NA' and br !='LC'";
								$stmt = $conn->prepare($sql);
								$stmt->execute();
								$row = $stmt->fetch(PDO::FETCH_ASSOC);
								$valor = $row['total'];  // Correctly assign the single value to $valor
								echo $valor;

								?>

								<span style="font-size: 30px"> espécies</span></h5>

							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card text-white bg-danger mb-3" style="max-width: 18rem;" id="sombra">
							<div class="card-header" align="center">Espécies ameaçadas globalmente</div>
							<div class="card-body">
								<h5 class="card-title" style="text-align: center;font-size: 40px">
									<?php

									
									$sql   =  "SELECT COUNT(distinct(especie)) AS total FROM resgate WHERE iucn != 'LC' and  iucn != '-' ";
									$stmt = $conn->prepare($sql);
								$stmt->execute();
								$row = $stmt->fetch(PDO::FETCH_ASSOC);
								$valor = $row['total'];  // Correctly assign the single value to $valor
								echo $valor;


									?>
									<span style="font-size: 30px"> espécies</span></h5>

								</div>
							</div>
						</div>

					</div>
				</div>
	
				        

			</body>
			</html>