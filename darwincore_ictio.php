<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>

$(document).ready(function() {
    $('#tabela1').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "listar_ictio_darwin.php",
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"
        }
    })

    $('#tabela2').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "listar_ictio_darwin_oc.php",
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"
        }
    }
        )

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

<?php include 'header.php' ?>
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
                <a href = "http://www.ief.mg.gov.br/fauna/autorizacao-de-manejo-de-fauna-no-ambito-de-licenciamento"  target="_blank" rel="noopener noreferrer"> <img class="d-block w-90" src="img/IEF.jpg"></a>
                <br>
                <p>Clique no portal do IEF para informações da darwin core</p>
            </div>
            </div>
          </div>
        </div>
    </div>
</div>


 <br>
    
<h3>Planilha DarwinCore - aba  Associated Occurrences</h3>
<br>
<div class="table-responsive">
<table id="tabela2"  class="display" style="width:100%">
        <thead >
            <tr>

                <th >eventID</th>
                <th >occurrenceID</th>
                <th >basisOfRecord</th>
                <th >scientificName </th>
                <th >kingdon </th>
                <th >phylum</th>
                <th >class</th>
                <th >order_</th>
                <th >family</th>
                <th >taxonRank</th>
                <th >identificationQualifier</th>
                <th >recordedBy</th>
                <th >individualCount</th>
                <th >sex</th>
                <th >lifeStage</th>
                <th >reproductiveCondition</th>
                <th >preparations</th>
                <th >occurrenceRemark</th>

            </tr>
     
        </thead>
        
        </table>   
        
     

 

  <a href="lista_sp_ictiofauna.php" role="button" class = "btn btn-sm btn-primary"> Voltar </a>

  
  </div>      
     


     <br>
     <br>
    
<h3>Planilha DarwinCore - aba Sampling Events</h3>
<br> 
<div class="table-responsive">
<table id="tabela1"  class="display" style="width:100%">
        <thead >
            <tr>

                <th >eventID</th>
                <th >samplingProtocol</th>
                <th >samplingEffort</th>
                <th >sampleSizeValue </th>
                <th >sampleSizeUnit </th>
                <th >eventDate</th>
                <th >eventRemarks</th>
                <th >county</th>
                <th >municipality</th>
                <th >waterBody</th>
                <th >locality</th>
                <th >decimalLatitude</th>
                <th >decimalLongitude</th>
                <th >geodeticDatum</th>
            </tr>
     
        </thead>
        
        </table>   
        
     
 </div> 
 

  <a href="lista_sp_ictiofauna.php" role="button" class = "btn btn-sm btn-primary"> Voltar </a>

           <br>
     <br>
    
<h3>Planilha DarwinCore - aba Checklist</h3>
<br> 
<div class="table-responsive">
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
                <th >scientificNameAuthorship</th>
                <th >taxonRank</th>
                 <th >taxonomicStatus</th>
                  <th >associatedReferences</th>


            </tr>
     
        </thead>
        
        </table>   
        
     
 </div>
 

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
<?php include 'footer.php' ?>

</html>