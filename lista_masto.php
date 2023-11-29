<!DOCTYPE html>
<html>

<head>
	<title></title>
	<style type="text/css">
		#sombra {
			-webkit-box-shadow: 6px 9px 7px 0px rgba(176, 176, 176, 0.75);
			-moz-box-shadow: 6px 9px 7px 0px rgba(176, 176, 176, 0.75);
			box-shadow: 6px 9px 7px 0px rgba(176, 176, 176, 0.75);
		}
	</style>
</head>





<body>
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
				<th scope="col">Nome popular</th>
				<th scope="col">Número total de registros</th>
				<th scope="col">Registro fotográfico</th>
			</tr>
		</thead>

		<?php include 'conexao.php' ?>
		<?php
	
		$searchTerm = isset($_POST['search']) ? $_POST['search'] : '';
		$sql = "SELECT distinct(especie), familia, nome_popular, count(numero_ind) as total FROM mastofauna WHERE especie LIKE '%$searchTerm%' GROUP BY especie";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		while ($array = $stmt -> fetch(PDO::FETCH_ASSOC)) {

			$familia = $array['familia'];
			$especie = $array['especie'];
			$nome_popular = $array['nome_popular'];
			$total = $array['total'];
		?>
			<tr>
				<td><?php echo $familia ?></td>
				<td> <i> <?php echo $especie ?> </i></td>
				<td> <i> <?php echo $nome_popular ?> </i></td>
				<td> <?php echo $total ?> </td>


				<td>
					<a role="button" class="btn btn-outline-success btn-lg" href="imagem_mastofauna.php?sp=<?php echo $especie ?>&familia=<?php echo $familia ?>"><i class="fa-solid fa-image"></i></a></p>
				</td>
			<?php } ?>

			</tr>

	</table>


</body>

</html>