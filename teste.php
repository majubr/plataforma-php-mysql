<html lang="pt">

<?php include 'header.php' ?>
<h4 align='center' class="display-5 mb-4" style="font-size: 30px">Banco de dados da fauna da Serra Azul</h4>
<br>
<h3 align="center" class="display-5 mb-4" style="font-size: 30px">Banco de consultores responsáveis pelas coletas de dados biológicos</h3>
<br>
<br>
<p class="display-5 mb-4" style="font-size: 30px">Lista de profissionais</p>
<form action="" method="GET" class="mb-3">
  <div class="input-group">
    <input type="text" name="search" class="form-control" placeholder="Digite o nome do consultor">
    <button type="submit" class="btn btn-primary">Buscar</button>
  </div>
</form>
<table class="table">
  <thead>
    <tr>
    <th>projeto</th>
                    <th>município</th>
                    <th>ano</th>
                    <th>data</th>
                    <th>estacao</th>
                    <th>classe</th>
                    <th>ordem</th>
                    <th>família</th>
                    <th>gênero</th>
                    <th>espécie</th>
                    <th>nome popular</th>
                    <th>COPAM 2014</th>
                    <th>MMA 2022</th>
                    <th>IUCN 2022</th>
                    <th>número de indivíduos</th>
                    <th>região</th>
                    <th>ponto amostral</th>
                    <th>metodologia</th>
                    <th>latitude</th>
                    <th>longitude</th>
                    <th>campanha</th>
                    <th>coletor</th>
                    <th>especialidade</th>
                    <th>empresa</th>
                    <th>obs</th>
    </tr>
  </thead>


  <?php include 'conexao.php' ?>
  <?php

  $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
  $sql = "SELECT * FROM avifauna WHERE especie LIKE '%$searchTerm%' GROUP BY especie";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  while ($array = $stmt -> fetch(PDO::FETCH_ASSOC)) {

    extract ($array);
  ?>
    <tr>
      <td class="coletor-link"><?php echo $nome ?></td>
      <td><?php echo $municipio ?></td>
      <td><?php echo $especialidade ?></td>
      <td><?php echo $data ?></td>
      <td><?php echo $estacao ?></td>
      <td><?php echo $classe ?></td>
      <td><?php echo $ordem ?></td>
      <td><?php echo $familia ?></td>
      <td><?php echo $genero ?></td>
      <td><?php echo $especie ?></td>
      <td><?php echo $nome_popular ?></td>
      <td><?php echo $mg ?></td>
      <td><?php echo $br ?></td>
      <td><?php echo $iucn ?></td>
      <td><?php echo $email ?></td>
      <td><?php echo $email ?></td>
    </tr>
  <?php } ?>
</table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.coletor-link').click(function() {
      var nomeColetor = $(this).text();
      // Faça algo com o nome do coletor, como procurar no código fornecido
      console.log('Nome do consultor:', nomeColetor);
      // Redirecione para o código fornecido passando o nome do consultor como parâmetro
      window.location.href = 'listar_masto.php?coletor=' + encodeURIComponent(nomeColetor);
    });
  });
</script>

</script>
<br>
<?php include 'footer.php' ?>
</body>

</html>