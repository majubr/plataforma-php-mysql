<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>

$(document).ready(function() {
    $('#listar').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "listar_avi.php",
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"
        }
    });
});


</script>

<?php include 'header.php'  ?>
  

</div> 
<div  class = 'container' style="margin-top:40px">

  
        <div align="left">  
      <p class="display-5 mb-4" align ="center" style="font-size: 30px"> Manipulação de tabelas - avifauna </p>
      <br>
      <p align="left" class="display-5 mb-4" style="font-size: 20px">* Atenção!! Não inserir dados não revisados </p>
<br>
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
       
                   <p align="left" class="display-5 mb-4" style="font-size: 30px"> Planilha DarwinCore - importaçao e exportação</p>


   <form action= "importar_avi_oc.php" method="POST" enctype="multipart/form-data">
  

                    <button type="submit" class="btn btn-outline-success " >Importar conjunto de dados (aba) - Associated Occurences, selecione abaixo - arquivo .CSV </button>
            <div class="checkbox" >
                <label><input type="file" name="file" ></label>
            </div>
            </form>

                    <form method="post" action="exportar_avi_oc.php" align="left">  
                <input type="submit" name="exportar" value="Exportar planilha (aba) Associated Occurences - arquivo .xlsx" class="btn btn-outline-success " />  
                </form>
                 <form action= "importar_avi_dw.php" method="POST" enctype="multipart/form-data">


                    <button type="submit" class="btn btn-outline-success " >Importar conjunto de dados (aba) - Sampling, selecione abaixo - arquivo .CSV </button>
            <div class="checkbox" >
                <label><input type="file" name="file" ></label>
            </div>
            </form>
                <form method="post" action="exportar_avi_dw.php" align="left">  
                <input type="submit" name="exportar" value="Exportar planilha (aba) Sampling - arquivo .xlsx" class="btn btn-outline-success " />  
                </form>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
           <form action= "importar_avi.php" method="POST" enctype="multipart/form-data">
    <p align="left" class="display-5 mb-4" style="font-size: 30px"> Tabela de dados para analises - importaçao e exportação </p>

                    <button type="submit" class="btn btn-outline-success " >Importar conjunto de dados para a base de analise, selecione abaixo - arquivo .CSV</button>
            <div class="checkbox" >
                <label><input type="file" name="file" ></label>
            </div>
            </form>  
                <form method="post" action="exportar_avi.php" align="left">  
                <input type="submit" name="exportar" value="Exportar conjunto de dados da base de analise - arquivo .CSV" class="btn btn-outline-success " />  
                </form>
      </div>
    </div>
  </div>
</div>
<br>
<br>
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div align="center" class="card-body"> 
                  <form action= "conversao_darwin_avi.php" method="POST" enctype="multipart/form-data">
                    <p align="left" class="display-5 mb-4" style="font-size: 30px">  Conversão - planilhas DarwinCore para a tabela de dados de analise e dashboard</p>
                    <button type="submit" class="btn btn-outline-success " > Clique aqui para conversão</button>
                    <p></p>
                    <a href = "conversao_darwin_avi.php"> <img src="conversao.png"></a>
                    
            </form>
          
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div align="center" class="card-body">
        <img img src="ave.jpg" alt="Image" >
      </div>
    </div>
  </div>
                     
    </div>
    </div>
    <br>
    <br>
   <div align="center">
  <a href="lista_sp_avifauna.php" role="button" class="btn btn-light btn-lg"> Voltar </a>
</div>
<br>
   
<!-- JavaScript Bundle with Popper -->


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>


</body>
<?php include 'footer.php' ?>
</html>