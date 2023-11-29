  <html>
  <head>
    
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['especie', 'numero_ind'],
          
          <?php 
             
        $conexao = new mysqli("localhost", "root", "", "fauna");
        $sql = "SELECT especie, count(especie) as numero  FROM herpetofauna GROUP BY especie";
        //$sql = "SELECT especie, cast(100*count(*) / sum(count(*) over () as decimal (10,2)) AS abundancia FROM herpetofauna GROUP BY especie";
        $buscar = mysqli_query($conexao,$sql);

        while ($dados = mysqli_fetch_array($buscar)){
        $especies = $dados['especie'];
        $numero = $dados['numero'];
      ?>
        ['<?php echo $especies ?>', <?php echo $numero ?>],
         
     <?php } ?>

          ]);

        var options = {
          title: 'Especies',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="height: 400px"></div>
  </body>
</html>




