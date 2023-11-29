<html>

<head>
    <title>Exibição de coordenadas geográficas</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6eEKid9nFNYi6tN9DUK7guoWBP_O9uFo"></script>
    <script>
        function initMap() {
            // Cria um mapa do Google
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 8,
                center: {
                    lat: -23.5489,
                    lng: -46.6388
                } // Coordenadas iniciais do mapa
            });

            // Adiciona um marcador para as coordenadas selecionadas pelo usuário
            var marker = new google.maps.Marker({
                position: {
                    lat: <?php echo $lat; ?>,
                    long: <?php echo $lon; ?>
                },
                map: map
            });
        }
    </script>
</head>

<body onload="initMap()">

    <?php
    // Verifica se o ID foi passado pela página anterior
    if (isset($_GET["especie"])) {
        $especie = $_GET["especie"];

        // Conecta ao banco de dados
        $mysqli = new mysqli("localhost", "root", "", "fauna");

        // Verifica se a conexão foi bem sucedida
        if ($mysqli->connect_errno) {
            echo "Falha ao conectar ao MySQL: " . $mysqli->connect_error;
        }

        // Seleciona as coordenadas correspondentes ao ID
        $especie = mysqli_real_escape_string($mysqli, $especie);
        $result = $mysqli->query("SELECT lat, lon FROM herpetofauna WHERE especie = '$especie'");

        // Verifica se foram encontradas coordenadas correspondentes ao ID
        if ($result->num_rows > 0) {
            // Armazena as coordenadas em variáveis
            $row = $result->fetch_assoc();
            $lat = $row["lat"];
            $lon = $row["lon"];
        } else {
            // Exibe uma mensagem de erro se as coordenadas não foram encontradas
            echo "As coordenadas correspondentes ao ID $id não foram encontradas.";
        }

        // Fecha a conexão com o banco de dados
        $mysqli->close();
    }
    ?>
    <div id="map" style="height: 400px;"></div>
</body>

</html>