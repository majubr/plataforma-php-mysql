<html lang="pt">


<?php include 'header.php' ?>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block sidebar" style='background-color:#f6f5f4;border-right: 1px solid #f3f3f3'>
          <div class="sidebar-sticky" class="display-5 mb-4" style="font-size: 19px">

            <ul class="nav flex-column" style="padding-top: 20px">
              <li class="nav-item">
                <a class="nav-link" href="?pagina=painel_resgate" style="color:#000;text-decoration: none">

                  <i class="fa-solid fa-gauge"></i>&nbsp&nbspDescrição quantitativa

                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?pagina=especie" style="color:#000;text-decoration: none">

                  <i class="fa-solid fa-list"></i>&nbsp&nbspLista de espécies

                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?pagina=especie_ameaçada" style="color:#000;text-decoration: none">

                  <i class="fa-solid fa-list"></i>&nbsp&nbspLista de espécies ameaçadas
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?pagina=abundancia_resgate" style="color:#000;text-decoration: none">

                  <i class="fa-solid fa-chart-line"></i>&nbsp&nbspGráfico - Espécies
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?pagina=familia_resgate" style="color:#000;text-decoration: none">

                  <i class="fa-solid fa-chart-line"></i>&nbsp&nbspGráfico - Familias
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?pagina=ordem_resgate" style="color:#000;text-decoration: none">

                  <i class="fa-solid fa-chart-line"></i>&nbsp&nbspGráfico - Ordem
                </a>
              </li>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?pagina=regiao_resgate" style="color:#000;text-decoration: none">

                  <i class="fa-solid fa-chart-line"></i>&nbsp&nbspGráfico - Região de estudo
                </a>
              </li>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?pagina=campanha_resgate" style="color:#000;text-decoration: none">

                  <i class="fa-solid fa-chart-line"></i>&nbsp&nbspGráfico - Campanhas
                </a>
              </li>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?pagina=estacao_resgate" style="color:#000;text-decoration: none">

                  <i class="fa-solid fa-chart-line"></i>&nbsp&nbspGráfico - Chuva x Seca
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?pagina=curva_resgate" style="color:#000;text-decoration: none">

                  <i class="fa-solid fa-chart-line"></i>&nbsp&nbspGráfico - Curva do coletor (em construção)
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="" style="color:#000;text-decoration: none">

                  <i class="fa-solid fa-chart-line"></i>&nbsp&nbspEstimativas de riqueza (em construção)
                </a>
              </li>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?pagina=opcoes_resgate" style="color:#000;text-decoration: none">

                  <i class="fa-solid fa-map-location-dot"></i>&nbsp&nbspMapa
                </a>
              </li>

            </ul>


          </div>



        </nav>

        <!-- conteudo -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h4 class="display-5 mb-4" style="font-size: 30px">Dashboard resgate</h4>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">

              </div>

            </div>

          </div>
          <p class="display-5 mb-4" style="font-size:200%;"></p>
          <?php

          if (isset($_GET['pagina'])) {

            switch ($_GET['pagina']) {
              case 'especie':
                echo '<h2>Lista de espécies</h2>';
                include 'lista_resgate.php';
                break;

              case 'especie_ameaçada':
                echo '<h2>Lista de espécies ameaçadas</h2>';
                include 'lista_resgate_ameacada.php';
                break;

              case 'abundancia_resgate':
                echo '<p class="display-5 mb-4" style="font-size:200%;">Proporção de registros por espécie por ano</p>';
                include 'graficos/abundancia_resgate.php';
                break;



              case 'familia_resgate':
                echo '<p class="display-5 mb-4" style="font-size:200%;">Proporção de registros por familia por ano</p>';
                include 'graficos/familia_resgate.php';
                break;

              case 'ordem_resgate':
                echo '<p class="display-5 mb-4" style="font-size:200%;">Proporção de registros por ordem por ano</p>';
                include 'graficos/ordem_resgate.php';
                break;

              case 'estacao_resgate':
                echo '<p class="display-5 mb-4" style="font-size:200%;">Proporção de registros por estação por ano</p>';
                include 'graficos/estacao_resgate.php';
                break;

              case 'regiao_resgate':
                echo '<p class="display-5 mb-4" style="font-size:200%;">Proporção de registros por região</p>';
                include 'graficos/regiao_resgate.php';
                break;

              case 'campanha_resgate':
                echo '<p class="display-5 mb-4" style="font-size:200%;">Número de registros por campanha</p>';
                include 'graficos/campanha_resgate.php';
                break;

              case 'opcoes_resgate':
                echo '<p class="display-5 mb-4" style="font-size:200%;">Distribuição cartográfica das espécies</p>';
                include 'opcoes_mapa_resgate.php';
                break;

              case 'curva_resgate':
                echo '<p class="display-5 mb-4" style="font-size:200%;">Curva do coletor</p>';
                include 'lista_resgate.php';
                break;
              case 'riqueza_resgate':
                echo '<p class="display-5 mb-4" style="font-size:200%;">Estimativas de riqueza</p>';
                include 'lista_resgate.php';
                break;



              default:
                include 'painel_resgate.php';

                break;
            }
          }



          ?>


        </main>
      </div>
    </div>

    </nav>
  </div>

  <!-- Principal JavaScript do Bootstrap
      ================================================== -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


  <script type="text/javascript">
    $(window).resize(function() {
      drawChart();
      drawChart2();
    });
  </script>

  <br>
  <div align="center">
    <a href="lista_sp_resgate.php" role="button" class="btn btn-light btn-lg"> Ir para tabela de dados </a>
    <br>
    <br>
     <a href="dashboard.php" role="button" class = "btn btn-light btn-lg"> Voltar Dashboard </a>
  </div>
</body>
</div>
<br>

<br>
<?php include 'footer.php'  ?>

</html>

</html>