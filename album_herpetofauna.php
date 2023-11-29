<html lang="pt">


<html lang="pt">

<?php include 'header.php' ?>
        <h4 class="display-5 mb-4" style="font-size: 30px">Galeria de imagens da herpetofauna</h2>
            
      <a  href="add_image_herpeto.php" role="button" class = "btn btn-outline-success btn-lg"> Adicionar nova imagem ao banco </a>
    </div>

        <div class="main">
            <ul id="og-grid" class="og-grid">
                <?php
                $conn = mysqli_connect("localhost", "root", "", "fauna");
                $sql = "SELECT * FROM herpeto_imagens";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_object($result)) {
                ?>

                    <li>
                        <a href="javascript:void(0);" data-largesrc="uploads/<?php echo $row->path; ?>" data-title="<h1 >Espécie: <i><?php echo $row->sp; ?></i></h1>" data-description="<h1 >Familia:<?php echo $row->familia; ?></h1>">
                            <img src="uploads/<?php echo $row->path; ?>" style="width: 250px; height: 250px;" class="img-responsive" alt="img01" />

                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div><!-- /container -->
    <script src="assets/jquery-1.11.3.min.js"></script>
    <script src="assets/grid.js"></script>
    <script>
        $(function() {
            Grid.init();
        });
    </script>
</body>
<footer align="center">
<a class="navbar-brand" href="https://primeconsultoriaambiental.com.br/"><img src="prime.jpg" height="40px"> </a>
<br>
<br>
  <p style="text-align: center;font-size: 10px"> NEXUS COMERCIO, MANUTENCAO E ELABORACAO DE SISTEMAS LTDA - Lavras Novas, MG / CONTATO@NEXUSMIND.COM.BR </p>
  
</footer>
</html>