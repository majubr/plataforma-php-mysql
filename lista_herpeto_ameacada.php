<!DOCTYPE html>
<html>

<body>
<br>
<p class="display-5 mb-4" style="font-size: 30px">Lista de espécies ameaçadas da herpetofauna</p>

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
			<th scope="col">COPAM 2014</th>
			<th scope="col">MMA 2022</th>
			<th scope="col">IUCN 2022</th>
			<th scope="col">Número de registros</th>
		</tr>
	</thead>
		<?php include 'conexao.php'?>
	<?php
		
		$searchTerm = isset($_POST['search']) ? $_POST['search'] : '';

		$sql = "SELECT DISTINCT especie, nome_popular, familia, mg, br, iucn, COUNT(numero_ind) AS total FROM herpetofauna WHERE especie LIKE '%$searchTerm%' AND (mg != 'NA' or br != 'NA' or iucn != 'NA') AND (mg != '-' or br != '-' or iucn !='-' ) AND (iucn !='LC' ) AND ( iucn !='LC' ) AND (mg != ' ' or br != ' ' or iucn != ' ')  GROUP BY especie";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		while ($array = $stmt -> fetch(PDO::FETCH_ASSOC)) {
			$familia = $array['familia'];
			$especie = $array['especie'];
			$nome = $array['nome_popular'];
			$mg = $array['mg'];
			$br = $array['br'];
			$iucn = $array['iucn'];
			$total = $array['total'];
	?>
		<tr>	
			<td><?php echo $familia ?></td>
			<td><i><?php echo $especie ?></i></td>
			<td><i><?php echo $nome ?></i></td>
			<td><i><?php echo $mg ?></i></td>
			<td><i><?php echo $br ?></i></td>
			<td><i><?php echo $iucn ?></i></td>
			<td><?php echo $total ?></td>
		</tr>
	<?php } ?>		
</table>

</body>
</html>

</html>
