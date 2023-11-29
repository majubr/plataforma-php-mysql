
<html lang="pt">


<head >

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Banco de dados / Biodiversidade</title>

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/default.css" />
    <link rel="stylesheet" href="assets/component.css" />
    <script src="assets/modernizr.custom.js"></script>

 <style type="text/css">
      #tamanhoContainer{
        width: 500px;
      }
    #botao {
      background-color: #C0C0C0; /* cor de fundo*/
      color: #ffffff; /* cor da letra */
    }

 

       #sombra {
      -webkit-box-shadow: 6px 9px 7px 0px rgba(176,176,176,0.75);
      -moz-box-shadow: 6px 9px 7px 0px rgba(176,176,176,0.75);
      box-shadow: 6px 9px 7px 0px rgba(176,176,176,0.75);
    }
     </style>
</head>

<body >

<div class="container" >

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg" style="background-color: #7fdb27">
      <div class="container-fluid" style="background-color: #fff">
        <a href="https://www.usiminas.com/" class="navbar-brand">
          <img src="logo usiminas.png" alt="Logotipo Usiminas" height="80px" id="logo-topo">
        </a>
        <a class="navbar-brand" href="#">Banco de dados de biodiversidade</a>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            <a class="nav-link" href="BD.php">Banco de dados</a>
            <a class="nav-link" href="BD_imagens.php">Banco de imagens</a>
            <a class="nav-link" href="dashboard.php">Dashboard</a>
            <a class="nav-link" href="consultores.php">Banco de consultores</a>
            <a class="nav-link" href="sobre.php">Sobre</a>
          </div>
        </div>
      </div>
    </nav>
<br>
<br>

<h4 class="display-5 mb-4" style="font-size: 30px">Galeria de imagens da herpetofauna</h2>
<p class="display-5 mb-4" style="font-size: 25px">Selecione a imagem para detalhes da espécie</p>


<div align="center" class="container">

      <br>
      <div class="main">
        <ul id="og-grid" class="og-grid">

          <div >     
      <a  href="add_image_herpeto.php" role="button" class = "btn btn-outline-success btn-lg"> Adicionar nova imagem ao banco </a>
    </div>
    <br>
    <br>

 <?php
                    $conn = mysqli_connect("localhost", "root", "", "fauna");
                    $sql = "SELECT * FROM herpeto_imagens";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_object($result)) {
                    ?>

                    <li>
            <a href="javascript:void(0);" data-largesrc="uploads/<?php echo $row->path; ?>" data-title="<h1 >Espécie: <i><?php echo $row->sp; ?></i></h1>" data-description="<h1 >Familia:<?php echo $row->familia; ?></h1>">
              <img src="uploads/<?php echo $row->path; ?>" style="width: 250px; height: 250px;" class="img-responsive" alt="img01"/>

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
  </div>
  </body>
</html>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQrDapiXJT_yG77fJfQqQbX41vxNVvlSE"></script>

<div class="btns">
  <br>

  <a href="imagens_herpetofauna.php?foto=<?php echo $anteriorImagem; ?>" role="button" class="btn btn-success btn-sm">Voltar</a>
  <span> | </span>
  <a href="imagens_herpetofauna.php?foto=<?php echo $proxImagem; ?>" role="button" class="btn btn-success btn-sm">Avançar</a>
</div>
<form method="POST">
    <p class="display-5 mb-4" style="font-size:150%;">Insira abaixo as coordenadas requeridas consultando a tabela geral, depois selecione mapa de satelite ou mapa rodoviario</p>
    <p>
        <input type="text" name="latitude" placeholder="Enter latitude">
    </p>

    <p>
        <input type="text" name="longitude" placeholder="Enter longitude">
    </p>

    <input class="btn btn-outline-success" type="submit" name="submit_coordinates">
</form>
    <a href="dash_herpeto.php" role="button" class = "btn btn-outline-success"> Voltar para Dashboard Herpetofauna </a>
 <br>
 <br>

   
     <br>
  <?php

    if (isset($_POST["submit_coordinates"]))
    {
        $latitude = $_POST["latitude"];
        $longitude = $_POST["longitude"];
        ?>

        <iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo $latitude; ?>,<?php echo $longitude; ?>&output=embed"></iframe>

        <?php
    }
?>  


<!DOCTYPE html>
<?php

$conexao = new mysqli("localhost", "root", "", "fauna");


$sql =  "SELECT regiao, count(regiao) as numero  FROM herpetofauna GROUP BY regiao";
$buscar = mysqli_query($conexao,$sql);

#chart.js - Preparando valores#

$regiao = '';
$numero = '';

while ($dados = mysqli_fetch_array($buscar)) {
 $regiao = $regiao . '"' . $dados['regiao'] . '",';
   $numero = $numero . '"' . $dados['numero'] . '",';

   $regiao = trim($regiao); #tira os espaços da variável
   $numero = trim($numero);


  }

  ?>
<html>
<head>
  <title></title>
</head>
<body>
  <canvas id="myChart"></canvas>


  <button name="chartValor" id="chartValor"  onclick="updateChartType()">Todos os anos</button>

  <button name="chartValor" id="chartValor"  onclick="updateChartType2()">2020</button>

  <button name="chartValor2" id="chartValor2" onclick="updateChartType3()">2021</button>

  <button name="chartValor2" id="chartValor2" onclick="updateChartType3()">2022</button>
  

  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <script type="text/javascript">

    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'doughnut',

    // The data for our dataset
   
        // here we destroy/delete the old or previous chart and redraw it again
                
    data:  {
          labels:[<?php echo $regiao; ?>],
          datasets:
          [{
            label:'Numero de registros',
            data:[<?php echo $numero; ?>],
             backgroundColor: ['rgb(255,0,0)', 'rgb(0,255,0)', 'rgb(0,0,255)', 'rgb(238,238,238)','rgb(0,0,0)','rgb(150,206,180)','rgb(255,238,173)','rgb(255,111,105)','rgb(255,204,92)','rgb(136,216,176)','rgb(247,193,155)','rgb(235,171,127)','rgb(211,153,114)','rgb(189,137,102)'],
             borderColor: 'rgba(0,0,0)',
            borderWidth: 3,
            position: 'left'


          }]

        },
  
      
    
   
 
    // Configuration options go here
    options: { 
          legend: {
            display: true,
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
                fontColor:' #000000',
                fontSize:16,

              },
          
            }],
            yAxes: [{
              display: true,
              scaleLabel: {
                display: true,
                labelString: '',
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

$conexao = new mysqli("localhost", "root", "", "fauna");


$sql =  "SELECT regiao, count(regiao) as numero FROM herpetofauna GROUP BY regiao";
$buscar = mysqli_query($conexao,$sql);

#chart.js - Preparando valores#

$regiao = '';
$numero = '';

while ($dados = mysqli_fetch_array($buscar)) {
 $regiao = $regiao . '"' . $dados['regiao'] . '",';
   $numero = $numero . '"' . $dados['numero'] . '",';

   $regiao = trim($regiao); #tira os espaços da variável
   $numero = trim($numero);


  }

  ?>
  

if (document.getElementById('chartValor').value = 'Todos os anos') 
   
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'doughnut',

    // The data for our dataset
   
        // here we destroy/delete the old or previous chart and redraw it again
                
    data:  {
          labels:[<?php echo $regiao; ?>],
          datasets:
          [{
            label:'Numero de registros',
            data:[<?php echo $numero; ?>],
             backgroundColor: ['rgb(255,0,0)', 'rgb(0,255,0)', 'rgb(0,0,255)', 'rgb(238,238,238)','rgb(0,0,0)','rgb(150,206,180)','rgb(255,238,173)','rgb(255,111,105)','rgb(255,204,92)','rgb(136,216,176)','rgb(247,193,155)','rgb(235,171,127)','rgb(211,153,114)','rgb(189,137,102)'],
            borderColor: 'rgba(0,0,0)',
            borderWidth: 3,
            position: 'left'


          }]

        },
  
      
    
   
 
    // Configuration options go here
    options: { 
          legend: {
            display: true,
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
                fontColor:' #000000',
                fontSize:16,

              },
         
            }],
            yAxes: [{
              display: true,
              scaleLabel: {
                display: true,
                labelString: '',
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

$conexao = new mysqli("localhost", "root", "", "fauna");


$sql =  "SELECT regiao, count(regiao) as numero, ano  FROM herpetofauna WHERE ano='2020' GROUP BY regiao";
$buscar = mysqli_query($conexao,$sql);

#chart.js - Preparando valores#

$regiao = '';
$numero = '';

while ($dados = mysqli_fetch_array($buscar)) {
 $regiao = $regiao . '"' . $dados['regiao'] . '",';
   $numero = $numero . '"' . $dados['numero'] . '",';

   $regiao = trim($regiao); #tira os espaços da variável
   $numero = trim($numero);


  }

  ?>
  

if (document.getElementById('chartValor').value = '2021') 
   
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'doughnut',

    // The data for our dataset
   
        // here we destroy/delete the old or previous chart and redraw it again
                
    data:  {
          labels:[<?php echo $regiao; ?>],
          datasets:
          [{
            label:'Numero de registros',
            data:[<?php echo $numero; ?>],
            backgroundColor: ['rgb(255,0,0)', 'rgb(0,255,0)', 'rgb(0,0,255)', 'rgb(238,238,238)','rgb(0,0,0)','rgb(150,206,180)','rgb(255,238,173)','rgb(255,111,105)','rgb(255,204,92)','rgb(136,216,176)','rgb(247,193,155)','rgb(235,171,127)','rgb(211,153,114)','rgb(189,137,102)'],
            borderColor: 'rgba(0,0,0)',
            borderWidth: 3,
            position: 'left'


          }]

        },
  
      
    
   
 
    // Configuration options go here
    options: { 
          legend: {
            display: true,
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
                fontColor:' #000000',
                fontSize:16,

              },
          
            }],
            yAxes: [{
              display: true,
              scaleLabel: {
                display: true,
                labelString: '',
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

$conexao = new mysqli("localhost", "root", "", "fauna");


$sql =  "SELECT regiao, count(regiao) as numero, ano  FROM herpetofauna WHERE ano='2021' GROUP BY regiao";
$buscar = mysqli_query($conexao,$sql);

#chart.js - Preparando valores#

$regiao = '';
$numero = '';

while ($dados = mysqli_fetch_array($buscar)) {
 $regiao = $regiao . '"' . $dados['regiao'] . '",';
   $numero = $numero . '"' . $dados['numero'] . '",';

   $regiao = trim($regiao); #tira os espaços da variável
   $numero = trim($numero);


  }

  ?>
    
    if (document.getElementById('chartValor').value = '2021') 
   
  var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'doughnut',

    // The data for our dataset
   
        // here we destroy/delete the old or previous chart and redraw it again
                
    data:  {
          labels:[<?php echo $regiao; ?>],
          datasets:
          [{
            label:'Numero de registros',
            data:[<?php echo $numero; ?>],
            backgroundColor: ['rgb(255,0,0)', 'rgb(0,255,0)', 'rgb(0,0,255)', 'rgb(238,238,238)','rgb(0,0,0)','rgb(150,206,180)','rgb(255,238,173)','rgb(255,111,105)','rgb(255,204,92)','rgb(136,216,176)','rgb(247,193,155)','rgb(235,171,127)','rgb(211,153,114)','rgb(189,137,102)'],
            borderColor: 'rgba(0,0,0)',
            borderWidth: 3,
            position: 'left'


          }]

        },
  
      
    
   
 
    // Configuration options go here
    options: { 
          legend: {
            display: true,
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
                fontColor:' #000000',
                fontSize:16,

              },
          
            }],
            yAxes: [{
              display: true,
              scaleLabel: {
                display: true,
                labelString: '',
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

$conexao = new mysqli("localhost", "root", "", "fauna");


$sql =  "SELECT regiao, count(regiao) as numero, ano  FROM herpetofauna WHERE ano='2021' GROUP BY regiao";
$buscar = mysqli_query($conexao,$sql);

#chart.js - Preparando valores#

$regiao = '';
$numero = '';

while ($dados = mysqli_fetch_array($buscar)) {
 $regiao = $regiao . '"' . $dados['regiao'] . '",';
   $numero = $numero . '"' . $dados['numero'] . '",';

   $regiao = trim($regiao); #tira os espaços da variável
   $numero = trim($numero);


  }

  ?>
    
    if (document.getElementById('chartValor').value = '2021') 
   
  var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'doughnut',

    // The data for our dataset
   
        // here we destroy/delete the old or previous chart and redraw it again
                
    data:  {
          labels:[<?php echo $regiao; ?>],
          datasets:
          [{
            label:'Numero de registros',
            data:[<?php echo $numero; ?>],
            backgroundColor: ['rgb(255,0,0)', 'rgb(0,255,0)', 'rgb(0,0,255)', 'rgb(238,238,238)','rgb(0,0,0)','rgb(150,206,180)','rgb(255,238,173)','rgb(255,111,105)','rgb(255,204,92)','rgb(136,216,176)','rgb(247,193,155)','rgb(235,171,127)','rgb(211,153,114)','rgb(189,137,102)'],
            borderColor: 'rgba(0,0,0)',
            borderWidth: 3,
            position: 'left'


          }]

        },
  
      
    
   
 
    // Configuration options go here
    options: { 
          legend: {
            display: true,
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
                fontColor:' #000000',
                fontSize:16,

              },
          
            }],
            yAxes: [{
              display: true,
              scaleLabel: {
                display: true,
                labelString: '',
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

































'$projeto','$municipio', '$ano', '$datas','$classe','$ordem','$familia','$genero','$especie' ,'$nome_popular','$numero_ind','$regiao','$ponto_amostral','$metodologia','$latitude','$longitude','$coletor','$especialidade','$empresa','$obs' 



<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="js/custom.js"></script>









<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Lidy Monteiro">
        <meta name="keywords" content="HTML5,javascript">
        <title>Formulário de Cadastro com HTML5 e JavaScript - Verificação de campos iguais</title>
    </head>
    <body>
        <!-- Área -->
        <header><h3>Tutorial - Blog Lidy Monteiro</h3></header>
        <!--Painel de Cadastro -->
        <section class="cadastro">
            <article class="cadastro_area">
                <header>
                    <h2 class="descricao">Verificação de campos iguais com HTML5 e Javascript</h2>
                </header>
                <form id="formCadastro" name="formulario" action="" method="POST">
                    <label for="txtSenha">Senha</label>
                    <input id="txtSenha" name="senha" type="password" required placeholder="Digite uma Senha" title="Senha" />
                    <label for="repetir_senha">Confirmar Senha</label>
                    <input id="repetir_senha" name="repetir_senha" type="password" required  placeholder="Repetir Senha" title="Repetir Senha" oninput="validaSenha(this)" />
                    <button type="submit" class="testar">Testar</button>
                </form>
            </article>
        </section>
    </body>
</html>
 
<script>
function validaSenha (input){ 
    if (input.value != document.getElementById('txtSenha').value) {
    input.setCustomValidity('Repita a senha corretamente');
  } else {
    input.setCustomValidity('');
  }
} 
</script>

while($row_herpetofauna = $result_herpetofauna->fetch(PDO::FETCH_ASSOC)){
    //var_dump($row_herpetofauna); 
   extract($row_herpetofauna);
    $registro = [];
    $registro [] = $id;
    $registro [] = $projeto;
    $registro [] = $municipio;
    $registro [] = $ano;
    $registro [] = $datas;
    $registro [] = $classe;
    $registro [] = $ordem;
    $registro [] = $familia;
    $registro [] = $genero;
    $registro [] = $especie;
    $registro [] = $nome_popular;
    $registro [] = $numero_ind;
    $registro [] = $ponto_amostral;
    $registro [] = $metodologia;
    $registro [] = $latitude;
    $registro [] = $longitude;
    $registro [] = $consultor;
    $registro [] = $especialidade;
    $registro [] = $empresa;
    $registro [] = $obs;
    $dados[] = $registro;


}
var_dump($dados);

$resultados = [
    "draw" => intval ($dados_requisicao['draw']),
    "recordsTotal" => intval($row_qnt_herpetofauna['qnt_indiv']),
    "recordsFiltered" => intval ($row_qnt_herpetofauna['qnt_indiv']),
    "data" => $dados
];

//var_dump($resultados);

echo json_encode($resultados); 

          LIMIT :inicio , :quantidade"; //LIMIT :inicio, :quantidade

          
          $result_herpetofauna->bindParam(':inicio', $dados_requisicao['start'], PDO::PARAM_INT);
$result_herpetofauna->bindParam(':quantidade', $dados_requisicao['length'], PDO::PARAM_INT);


<div class="modal fade" id="cadSPModal" tabindex="-1" aria-labelledby="cadSPModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cadSPModalLabel">Cadastrar novo registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span id="msgAlertErroCad"></span>
                    <form method="POST" id="form-cad-sp-herpeto">
                        <div class="row mb-3">
                            <label for="projeto" class="col-sm-2 col-form-label">Projeto</label>
                            <div class="col-sm-10">
                                <input type="text" name="projeto" class="form-control" id="projeto" placeholder="Projeto">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="municipio" class="col-sm-2 col-form-label">Município</label>
                            <div class="col-sm-10">
                                <input type="text" name="municipio" class="form-control" id="municipio" placeholder="Município">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ano" class="col-sm-2 col-form-label">Ano</label>
                            <div class="col-sm-10">
                                <input type="txt" name="ano" class="form-control" id="ano" placeholder="ano">
                            </div>
                        </div>
                         <div class="row mb-3">
                            <label for="datas" class="col-sm-2 col-form-label">Data</label>
                            <div class="col-sm-10">
                                <input type="date" name="datas" class="form-control" id="datas" placeholder="xxxx(ano)-xx(mês)-xx(dia)">
                            </div>
                        </div>
                         <div class="row mb-3">
                            <label for="classe" class="col-sm-2 col-form-label">Classe</label>
                            <div class="col-sm-10">
                                <input type="txt" name="classe" class="form-control" id="classe" placeholder="Classe">
                            </div>
                        </div>
                         <div class="row mb-3">
                            <label for="ordem" class="col-sm-2 col-form-label">Ordem</label>
                            <div class="col-sm-10">
                                <input type="txt" name="ordem" class="form-control" id="ordem" placeholder="Ordem">
                            </div>
                        </div>
                         <div class="row mb-3">
                            <label for="familia" class="col-sm-2 col-form-label">Família</label>
                            <div class="col-sm-10">
                                <input type="txt" name="familia" class="form-control" id="familia" placeholder="Família">
                            </div>
                        </div>
                         <div class="row mb-3">
                            <label for="genero" class="col-sm-2 col-form-label">Gênero</label>
                            <div class="col-sm-10">
                                <input type="txt" name="genero" class="form-control" id="genero" placeholder="Gênero">
                            </div>
                        </div>
                         <div class="row mb-3">
                            <label for="especies" class="col-sm-2 col-form-label">Espécie</label>
                            <div class="col-sm-10">
                                <input type="txt" name="especie" class="form-control" id="especie" placeholder="Espécie">
                            </div>
                        </div>
                         <div class="row mb-3">
                            <label for="nome_popular" class="col-sm-2 col-form-label">Nome popular</label>
                            <div class="col-sm-10">
                                <input type="txt" name="nome_popular" class="form-control" id="nome_popular" placeholder="Nome popular">
                            </div>
                        </div>
                         <div class="row mb-3">
                            <label for="numero_ind" class="col-sm-2 col-form-label">N. de indivíduos</label>
                            <div class="col-sm-10">
                                <input type="int" name="numero_ind"" class="form-control" id="numero_ind"" placeholder="Número de indivíduos">
                            </div>
                        </div>
                         <div class="row mb-3">
                            <label for="regiao" class="col-sm-2 col-form-label">Região</label>
                            <div class="col-sm-10">
                                <input type="txt" name="regiao" class="form-control" id="regiao" placeholder="Região">
                            </div>
                        </div>
                         <div class="row mb-3">
                            <label for="ponto_amostral" class="col-sm-2 col-form-label">Ponto Amostral</label>
                            <div class="col-sm-10">
                                <input type="txt" name="ponto_amostral" class="form-control" id="ponto_amostral" placeholder="Ponto amostral">
                            </div>
                        </div>
                          <div class="row mb-3">
                            <label for="metodologia" class="col-sm-2 col-form-label">Método</label>
                            <div class="col-sm-10">
                                <input type="txt" name="metodologia" class="form-control" id="metodologia" placeholder="Metodologia">
                            </div>
                        </div>

                          <div class="row mb-3">
                            <label for="latitude" class="col-sm-2 col-form-label">Latitude</label>
                            <div class="col-sm-10">
                                <input type="float" name="latitude" class="form-control" id="latitude" placeholder="Latitude">
                            </div>
                        </div>
                         <div class="row mb-3">
                            <label for="longitude" class="col-sm-2 col-form-label">Longitude</label>
                            <div class="col-sm-10">
                                <input type="float" name="longitude" class="form-control" id="longitude" placeholder="Longitude">
                            </div>
                        </div>

                          <div class="row mb-3">
                            <label for="consultor" class="col-sm-2 col-form-label">Consultor</label>
                            <div class="col-sm-10">
                                <input type="txt" name="consultor" class="form-control" id="consultor" placeholder="Consultores">
                            </div>
                        </div>
                         <div class="row mb-3">
                            <label for="especialidade" class="col-sm-2 col-form-label">Esp.</label>
                            <div class="col-sm-10">
                                <input type="txt" name="especialidade" class="form-control" id="especialidade" placeholder="Especialidade">
                            </div>
                        </div>

                         <div class="row mb-3">
                            <label for="empresa" class="col-sm-2 col-form-label">Empresa</label>
                            <div class="col-sm-10">
                                <input type="txt" name="empresa" class="form-control" id="empresa" placeholder="Empresa">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="obs" class="col-sm-2 col-form-label">Obs.</label>
                            <div class="col-sm-10">
                                <input type="txt" name="obs" class="form-control" id="obs" placeholder="Observações">
                            </div>
                        </div>
  
 


                        <button type="submit" class="btn btn-outline-success btn-sm" value="Cadastrar">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>



        const dados =  await fetch("cadastrar_herpeto.php",{
            method: "POST",
            body: dadosForm
            console.log(dados);

        const resposta = await dados.json();

        console.log(resposta);
    });