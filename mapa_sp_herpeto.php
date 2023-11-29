<html lang="pt">


<?php include 'header.php' ?>

<?php include 'conexao.php' ?>


<div class="container" style="font-size: 30px">
  <div align="left">  
      <h1 class="display-5 mb-4">Distribuição geográfica por espécie</h1>
      <br>
  </div>
<label >Selecione a espécie requerida</label>
<br>
<br>
<form action="resultado_sp_herpeto.php" method="post">
<select class="form-control" name="especie">

<?php 

        
        $sql = "SELECT distinct(especie) as sp FROM herpetofauna GROUP BY especie";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        while ($array = $stmt->fetch(PDO::FETCH_ASSOC)) {
          $especie = $array['sp'];
        

    ?>
 <option> <?php echo $especie ?> </option>
<?php } ?>
</select>
</div>
<br>
<div>
  <button type="submit"  class = "btn btn-outline-success btn-lg">Submeter</button>
</div>
</form>
<br>
<br>
<br>
<br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

 <div align="center">
                  <a href="dash_herpeto.php?pagina=opcoes_herpeto" role="button" class = "btn btn-light btn-lg"> Voltar </a>
      </div>
  </body>
<br>
<br>
<?php include 'footer.php'  ?>
  </html>        