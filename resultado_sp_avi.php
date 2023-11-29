<!DOCTYPE html>
<?php include 'header.php' ?>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zz5F5U4pOM5oJhpujvKzWvym6R5gfvDjZlRxFpeQN6B/n5zq/y0ox6ax5s5OipnRr" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zz5F5U4pOM5oJhpujvKzWvym6R5gfvDjZlRxFpeQN6B/n5zq/y0ox6ax5s5OipnRr" crossorigin="anonymous">
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFEY-USLfugz8y3y1AKt082l0BYUFUpKo&callback=initMap" defer></script>
    
    <!-- Include Google Maps API -->

    
    <style>
        /* Map style */
        #map {
            height: 600px;
            width: 100%;
        }
    </style>


<?php


try {
    // Conexão PDO com o banco de dados

    $hostname = "l6glqt8gsx37y4hs.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    $username = "bgincnwg9tteblot";
    $password = "epk1dmdv78po6oo1";
    $database = "tev9wa2lrbj9xb5v";
    $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['especie'])) {
        $especie = $_POST['especie'];

        // Prepare and execute a query to fetch coordinates
        $query = "SELECT lat, lon FROM avifauna WHERE especie = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$especie]); // Passando o valor da variável $especie como um array
        $coordinates = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Agora $coordinates contém as coordenadas buscadas do banco de dados
    }
} catch (PDOException $e) {
    die("Erro na conexão ou na consulta: " . $e->getMessage());
}
?>






        <div align="center">
            <br>
            <p class="display-5 mb-4" style="font-size: 30px">Distribuição dos locais de registro de <i><?php echo $especie ?></i></p>
            <br>
            <br>
            <p class="display-5 mb-4" style="font-size: 20px">No próprio mapa, faça a navegação e altere o zoom desejado. Escolha entre: imagem de satélite ou mapa rodoviário</p>
            <div id="map"></div>
        </div>
    </div>

    <script>
        function initMap() {
            // Check if coordinates are available
            <?php if (isset($coordinates)) { ?>
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 13,
                    center: {
                        lat: -20.1497,
                        lng: -44.4344
                    }
                });

                <?php foreach ($coordinates as $coordinate) { ?>
                    var marker = new google.maps.Marker({
                        position: {
                            lat: <?php echo $coordinate['lat']; ?>,
                            lng: <?php echo $coordinate['lon']; ?>
                        },
                        map: map,
                        title: 'Marker'
                    });
                <?php } ?>
            <?php } ?>
        }

        // Call the initMap function when the DOM is loaded
        google.maps.event.addDomListener(window, 'load', initMap);
    </script>

    <!-- Include Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <div align="center">
        <a href="dash_avi.php?pagina=opcoes_avi" role="button" class="btn btn-light btn-lg">Voltar</a>
    </div>

 <?php include 'footer.php' ?>
</body>
</html>

