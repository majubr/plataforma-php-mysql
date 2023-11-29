<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Mapa com Coordenadas Geográficas</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  <style>
    #mapid { height: 400px; }
  </style>
</head>
<body>

  <div id="mapid"></div>

  <script>
    // Conecta ao banco de dados
    $conexao = mysqli_connect("localhost", "root", "", "fauna");

    // Recupera as coordenadas
    $sql = "SELECT lat, lon FROM herpetofauna where especie = 'Boana lundii'";
    $resultado = mysqli_query($conexao, $sql);

    // Prepara o mapa
    var map = L.map('mapid').setView([-23.550520, -46.633309], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                   '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      maxZoom: 18,
    }).addTo(map);

    // Adiciona marcadores
    while ($coordenada = mysqli_fetch_array($resultado)) {
      var marker = L.marker([$coordenada['latitude'], $coordenada['longitude']]).addTo(map);
    }
  </script>

</body>
</html>