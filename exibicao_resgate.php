


<html lang="pt">


<?php include 'header.php'  ?>

<div class="container" >



<?php 

        include 'conexao.php';
        $sql = "SELECT * FROM resgate";

    ?>
  <?php 


    $latitude = $_GET['lat'] ?? null;
    $longitude = $_GET['lon'] ?? null;
    $especie = $_GET['sp'] ?? null;
        
    ?> 
<div align="center">
<p class="display-5 mb-4" style="font-size: 30px"> Localização geográfica </p>

<br>
<p class="display-5 mb-4" style="font-size: 30px"> <i><?php echo $especie; ?></i></p>
<p class="display-5 mb-4" style="font-size: 20px"> Latitude: <?php echo $latitude; ?> Longitude: <?php echo $longitude; ?></p>
<p class="display-5 mb-4" style="font-size: 20px"> No próprio mapa faça a navegaçao e altere o zoom desejado. Escolha entre: imagem de satelite ou mapa rodovidário </p>
<br>


        <iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo $latitude; ?>,<?php echo $longitude; ?>&output=embed"></iframe>

<br>
<br>
<br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

 <div align="center">
                  <a href="dash_resgate.php?pagina=opcoes_resgate" role="button" class = "btn btn-light btn-lg"> Voltar </a>
      </div>
  </body>
<br>
<br>
<?php include 'footer.php'  ?>
  </html>   