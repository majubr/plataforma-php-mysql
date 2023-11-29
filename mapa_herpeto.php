<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://kit.fontawesome.com/d83e880282.js" crossorigin="anonymous"></script>


<script>
  $(document).ready(function() {
    $('#listar2').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": "listar_sp_mapa_herpeto.php",
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"
      }
    });
  });
</script>

<?php include 'header.php' ?>
<div class='container' style="margin-top:40px">

  <div align="left">
    <h1 class="display-5 mb-4">Localização geográfica por registro</h1>
    <br>
  </div>


  <br>


  <div class="table-responsive">
    <table id="listar2" class="display" style="width:100%">
      <thead>
        <tr>
          <th>família</th>
          <th>espécie</th>
          <th>nome_popular</th>
          <th>região</th>
          <th>latitude</th>
          <th>longitude</th>
          <th>localização geográfica</th>

        </tr>

      </thead>

    </table>
    </body>


    <div align="center">
      <a href="dash_herpeto.php?pagina=opcoes_herpeto" role="button" class="btn btn-light btn-lg"> Voltar </a>
    </div>
  </div>


</div>


<!-- JavaScript Bundle with Popper -->

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="js/custom2.js"></script>
<script src="https://kit.fontawesome.com/d83e880282.js" crossorigin="anonymous"></script>


<br>
<br>
<?php include 'footer.php' ?>

</html>