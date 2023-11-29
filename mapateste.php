<!DOCTYPE html>
<html>

<head>
    <title>Exibir marcadores do Google Maps</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6eEKid9nFNYi6tN9DUK7guoWBP_O9uFo"></script>
    <style>
        /* Estilo para o mapa */
        #map {
            height: 400px;
            width: 50%;
        }
    </style>
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
            background-color: #FF1200;
            /* cor de fundo*/
            color: #ffffff;
            /* cor da letra */
        }
    </style>
</head>

<body bgcolor="green">

    <div class="container">

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid" style="background-color: #EBEBEB">
                <a class="navbar-brand" href="#">Banco de dados de biodiversidade</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        <a class="nav-link" href="BD.php">Banco de dados da fauna</a>
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
    </div>
    <div class='container' style="margin-top:40px">

        <div align="left">
            <h1 class="display-5 mb-4">Distribuição geográfica de pontos por registro</h1>
            <br>
        </div>
        <div id="map"></div>
        <script>
            function initMap() {
                // Crie o objeto do mapa
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 13,
                    center: {
                        lat: -20.1497,
                        lng: -44.4344
                    } // Defina o centro do mapa
                });

                <?php
                $especie = "Boana lundii";
                $mysqli = new mysqli("localhost", "usuario", "senha", "fauna");
                $especie = mysqli_real_escape_string($mysqli, $especie);
                $resultado = $mysqli->query("SELECT lat, lon FROM herpetofauna WHERE especie = '$especie'");

                while ($coordenada = mysqli_fetch_array($resultado)) {
                    $lat = $coordenada['lat'];
                    $lon = $coordenada['lon'];
                ?>
                    var marker = new google.maps.Marker({
                        position: {
                            lat: <?php echo $lat; ?>,
                            lng: <?php echo $lon; ?>
                        },
                        map: map,
                        title: 'Marcador'
                    });
                <?php
                }
                ?>
            }

            // Chame a função initMap() quando o DOM estiver carregado
            google.maps.event.addDomListener(window, 'load', initMap);
        </script>
</body>

</html>