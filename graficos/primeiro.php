<!DOCTYPE html>
<?php

$conexao = new mysqli("localhost", "root", "", "fauna");


$sql =  "SELECT familia, count(familia) as numero  FROM herpetofauna GROUP BY familia";
$buscar = mysqli_query($conexao,$sql);

#chart.js - Preparando valores#

$familia = '';
$numero = '';

while ($dados = mysqli_fetch_array($buscar)) {
 $familia = $familia . '"' . $dados['familia'] . '",';
   $numero = $numero . '"' . $dados['numero'] . '",';

   $familia = trim($familia); #tira os espaços da variável
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
  

  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <script type="text/javascript">

    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'pie',

    // The data for our dataset
   
        // here we destroy/delete the old or previous chart and redraw it again
                
    data:  {
          labels:[<?php echo $familia; ?>],
          datasets:
          [{
            label:'Numero de registros',
            data:[<?php echo $numero; ?>],
            backgroundColor: ['rgb(255,225,53,0.5)', 'rgb(63,207,93,0.5)', 'rgb(102,0,102,0.5)', 'rgb(255,127,80,0.5)','rgb(76,14,144,0.5)'],
            borderColor: 'rgba(0,0,0)',
            borderWidth: 3,
            position: 'left'


          }]

        },
  
      
    
   
 
    // Configuration options go here
    options: { 
          legend: {
            display: false,
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
              ticks: {
                fontColor: "black",
                fontSize: 15,
                
                
              }
            }],
            yAxes: [{
              display: true,
              scaleLabel: {
                display: true,
                labelString: 'Número de registros',
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


$sql =  "SELECT familia, count(familia) as numero FROM herpetofauna GROUP BY familia";
$buscar = mysqli_query($conexao,$sql);

#chart.js - Preparando valores#

$familia = '';
$numero = '';

while ($dados = mysqli_fetch_array($buscar)) {
 $familia = $familia . '"' . $dados['familia'] . '",';
   $numero = $numero . '"' . $dados['numero'] . '",';

   $familia = trim($familia); #tira os espaços da variável
   $numero = trim($numero);


  }

  ?>
  

if (document.getElementById('chartValor').value = 'Todos os anos') 
   
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'pie',

    // The data for our dataset
   
        // here we destroy/delete the old or previous chart and redraw it again
                
    data:  {
          labels:[<?php echo $familia; ?>],
          datasets:
          [{
            label:'Numero de registros',
            data:[<?php echo $numero; ?>],
            backgroundColor: ['rgb(255,225,53,0.5)', 'rgb(63,207,93,0.5)', 'rgb(102,0,102,0.5)', 'rgb(255,127,80,0.5)','rgb(76,14,144,0.5)'],
            borderColor: 'rgba(0,0,0)',
            borderWidth: 3,
            position: 'left'


          }]

        },
  
      
    
   
 
    // Configuration options go here
    options: { 
          legend: {
            display: false,
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
              ticks: {
                fontColor: "black",
                fontSize: 15,
                
                
              }
            }],
            yAxes: [{
              display: true,
              scaleLabel: {
                display: true,
                labelString: 'Número de registros',
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


$sql =  "SELECT familia, count(familia) as numero, ano  FROM herpetofauna WHERE ano='2020' GROUP BY familia";
$buscar = mysqli_query($conexao,$sql);

#chart.js - Preparando valores#

$familia = '';
$numero = '';

while ($dados = mysqli_fetch_array($buscar)) {
 $familia = $familia . '"' . $dados['familia'] . '",';
   $numero = $numero . '"' . $dados['numero'] . '",';

   $familia = trim($familia); #tira os espaços da variável
   $numero = trim($numero);


  }

  ?>
  

if (document.getElementById('chartValor').value = '2021') 
   
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'pie',

    // The data for our dataset
   
        // here we destroy/delete the old or previous chart and redraw it again
                
    data:  {
          labels:[<?php echo $familia; ?>],
          datasets:
          [{
            label:'Numero de registros',
            data:[<?php echo $numero; ?>],
            backgroundColor: ['rgb(255,225,53,0.5)', 'rgb(63,207,93,0.5)', 'rgb(102,0,102,0.5)', 'rgb(255,127,80,0.5)','rgb(76,14,144,0.5)'],
            borderColor: 'rgba(0,0,0)',
            borderWidth: 3,
            position: 'left'


          }]

        },
  
      
    
   
 
    // Configuration options go here
    options: { 
          legend: {
            display: false,
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
              ticks: {
                fontColor: "black",
                fontSize: 15,
                
                
              }
            }],
            yAxes: [{
              display: true,
              scaleLabel: {
                display: true,
                labelString: 'Número de registros',
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


$sql =  "SELECT familia, count(familia) as numero, ano  FROM herpetofauna WHERE ano='2021' GROUP BY familia";
$buscar = mysqli_query($conexao,$sql);

#chart.js - Preparando valores#

$familia = '';
$numero = '';

while ($dados = mysqli_fetch_array($buscar)) {
 $familia = $familia . '"' . $dados['familia'] . '",';
   $numero = $numero . '"' . $dados['numero'] . '",';

   $familia = trim($familia); #tira os espaços da variável
   $numero = trim($numero);


  }

  ?>
    
    if (document.getElementById('chartValor').value = '2021') 
   
  var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'pie',

    // The data for our dataset
   
        // here we destroy/delete the old or previous chart and redraw it again
                
    data:  {
          labels:[<?php echo $familia; ?>],
          datasets:
          [{
            label:'Numero de registros',
            data:[<?php echo $numero; ?>],
            backgroundColor: ['rgb(255,225,53,0.5)', 'rgb(63,207,93,0.5)', 'rgb(102,0,102,0.5)', 'rgb(255,127,80,0.5)','rgb(76,14,144,0.5)'],
            borderColor: 'rgba(0,0,0)',
            borderWidth: 3,
            position: 'left'


          }]

        },
  
      
    
   
 
    // Configuration options go here
    options: { 
          legend: {
            display: false,
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
              ticks: {
                fontColor: "black",
                fontSize: 15,
                
                
              }
            }],
            yAxes: [{
              display: true,
              scaleLabel: {
                display: true,
                labelString: 'Número de registros',
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