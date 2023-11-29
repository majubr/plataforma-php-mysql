<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>

$(document).ready(function() {
    $('#listar').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "listar_resgate.php",
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"
        }
    });
});


</script>

<head >

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Banco de dados / Biodiversidade</title>

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

 <style type="text/css">
        #tamanhoContainer{
            width: 500px;
        }
        #botao {
            background-color: #FF1200; /* cor de fundo*/
            color: #ffffff; /* cor da letra */
        }
        #listar tbody td:nth-child(10) {
        font-style: italic;
        }
     </style>
</head>

<body bgcolor="green">
  
<div class="container" >



  <!-- Nresgategation -->
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
</nav>
<br>
<br>
</div> 
<div  class = 'container' style="margin-top:40px">

<br>
       <p align="left" class="display-5 mb-4" style="font-size: 30px"> Inserçao de dados da planilha DarwinCore na tabela de dados de analise </p>

    <p align="left" class="display-5 mb-4" style="font-size: 20px"> Primeiramente insira as duas abas da planilha DarwinCore </p>
                  <form action= "importar_resgate_oc_conversao.php" method="POST" enctype="multipart/form-data">
                    <button type="submit" class="btn btn-outline-success " >Importar conjunto de dados DarwinCore para conversao - aba Associated Occurences</button>
            <div class="checkbox" >
                <label><input type="file" name="file" ></label>
            </div>
            </form>
             <form action= "importar_resgate_dw_conversao.php" method="POST" enctype="multipart/form-data">
                    <button type="submit" class="btn btn-outline-success " >Importar conjunto de dados DarwinCore para conversao - aba Sampling</button>
            <div class="checkbox" >
                <label><input type="file" name="file" ></label>
            </div>
            </form>

            <p align="left" class="display-5 mb-4" style="font-size: 20px"> Clique abaixo para conversão para tabela de dados analitica </p>
             <form action= "inserir_resgate_conversao.php" method="POST" enctype="multipart/form-data">
                    <button type="submit" class="btn btn-outline-success " >Inserçao na tabela de dados para analise</button>
            </form> 
      </div>
    </div>
  </div>

                     
    </div>
    </div>
    <br>
    <br>
   <div align="center">
  <a href="manipulacao_resgate.php" role="button" class="btn btn-light btn-lg"> Voltar </a>
</div>
<br>
   
<!-- JavaScript Bundle with Popper -->


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>


</body>
<footer align="center">
<a class="navbar-brand" href="https://primeconsultoriaambiental.com.br/"><img src="prime.jpg" height="40px"> </a>
<br>
<br>
  <p style="text-align: center;font-size: 10px"> NEXUS COMERCIO, MANUTENCAO E ELABORACAO DE SISTEMAS LTDA - Lavras Novas, MG / CONTATO@NEXUSMIND.COM.BR </p>
  
</footer>
</div>
</html>