


  <html>
  <head>
   
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Especie', 'Número de registros',{role: 'style'}],
          
          <?php 

             
        $conexao = new mysqli("localhost", "root", "", "fauna");
        $sql = "SELECT especie, count(especie) as numero  FROM herpetofauna GROUP BY especie";
        $buscar = mysqli_query($conexao,$sql);

        while ($dados = mysqli_fetch_array($buscar)){
        $genero = $dados['genero'];
        $registros = $dados['numero_ind'];
      ?>
        ['<?php echo $genero ?>', <?php echo $registros ?>,'#000'],
         
     <?php } ?>

          ]);

       var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Número de registros por espécie",
        width: 600,
        height: 400,
        bar: {groupWidth: "75%"},
        legend: { position: 'right' },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("graficoColuna"));
      chart.draw(view, options);
  }
    </script>
  </head>
  <body>
    <div id="graficoColuna" style="width: 900px;height: 400px"></div>
  </body>
</html>