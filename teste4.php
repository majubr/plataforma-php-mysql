<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>

$(document).ready(function() {


 $('#tabela3').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "listar_ictio_darwin_re.php",
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"
        }
    })

    ;

    ;
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
    #tamanhoContainer {
      width: 500px;
    }

    #botao {
      background-color: #C0C0C0;
      /* cor de fundo*/
      color: #ffffff;
      /* cor da letra */
    }



    #sombra {
      -webkit-box-shadow: 6px 9px 7px 0px rgba(176, 176, 176, 0.75);
      -moz-box-shadow: 6px 9px 7px 0px rgba(176, 176, 176, 0.75);
      box-shadow: 6px 9px 7px 0px rgba(176, 176, 176, 0.75);
    }
  </style>
</head>

<body>

  <div class="container">

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
<br>
</div> 
<div  class = 'container' style="margin-top:40px">

  <div align="left">  
      <h1 class="display-5 mb-4">Planilha Darwincore - ictiofauna</h1>
      <br>
  </div>
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <br>
             <br>
            
               
        </div>
 <div class="col-md-6">
        <div >
          <div  >
             <div class="container" align="right">
                <a href = "http://www.ief.mg.gov.br/fauna/autorizacao-de-manejo-de-fauna-no-ambito-de-licenciamento"  target="_blank" rel="noopener noreferrer"> <img class="d-block w-90" src="IEF.jpg"></a>
                <br>
                <p>Clique no portal do IEF para informações da darwin core</p>
            </div>
            </div>
          </div>
        </div>
    </div>
</div>


 <br>

    
<h3>Planilha DarwinCore - aba Checklist</h3>
<br> 
<table id="tabela3"  class="display" style="width:100%">
        <thead >
            <tr>

                <th >taxonID</th>
                <th >acceptedNameUsageID</th>
                <th >acceptedNameUsage</th>
                <th >nameAccordingTo </th>
                <th >kingdom </th>
                <th >phylum</th>
                <th >class</th>
                <th >order_</th>
                <th >family</th>
                <th >genus</th>
                <th >subgenus</th>
                <th >specificEpithet</th>
                <th >infraspecificEpithet</th>
                <th >scientificName</th>
                <th >scientificNameAuthorship</th>
                <th >taxonRank</th>
                 <th >taxonomicStatus</th>
                  <th >associatedReferences</th>


            </tr>
     
        </thead>
        
        </table>   
        
     

 

  <a href="lista_sp_ictiofauna.php" role="button" class = "btn btn-sm btn-primary"> Voltar </a>   
  </div> 

</div>
</div>
</body>
    
      
   
   
<!-- JavaScript Bundle with Popper -->


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>


</body>
<footer align="center">
<a class="navbar-brand" href="https://primeconsultoriaambiental.com.br/"><img src="prime.jpg" height="80px"> </a>
<br>
<br>
  <p style="text-align: center;font-size: 10px"> NEXUS COMERCIO, MANUTENCAO E ELABORACAO DE SISTEMAS LTDA - Lavras Novas, MG / CONTATO@NEXUSMIND.COM.BR</p>
  
</footer>

</html>