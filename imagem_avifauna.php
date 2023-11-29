<?php
// Include necessary files (header, connection, etc.)
include 'header.php';
include 'conexao.php';

// Check if 'sp' parameter is set in the URL
if (isset($_GET['sp'])) {
    $sp = $_GET['sp'];

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT * FROM avi_imagens WHERE sp = :sp";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':sp', $sp);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        ?>
        <div align="center">
            <p class="display-5 mb-4" style="font-size: 25px">Espécie ainda sem registro fotográfico</p>
       
        </div>
        <?php
    } else {
        $image_path = $row['path'];
        $full_image_path = 'imagens_avifauna/' . $image_path;
        if (file_exists($full_image_path)) {
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $extension = strtolower(pathinfo($image_path, PATHINFO_EXTENSION));
            echo '<br>';
            if (in_array($extension, $allowedExtensions)) {
                ?>
                <div align="center">
                    <!-- Display species details -->
                    <!-- ... (species details display remains unchanged) -->
                    <div class="image-container">
                        <!-- Display the image -->
                        <img src="<?php echo htmlspecialchars($full_image_path); ?>" alt="img01" />
                    </div>
                    <!-- ... (rest of the code remains unchanged) -->
                </div>
                <?php
            } else {
                echo "<p align='center' class='display-5 mb-4' style='font-size: 25px'>Imagem inválida ou formato não suportado.</p>";
            }
        } else {
            echo "<p align='center' class='display-5 mb-4' style='font-size: 25px'>Imagem não encontrada.</p>";
        }
    }
} else {
    // Handle the case when 'sp' parameter is not set
    echo "<p align='center' class='display-5 mb-4' style='font-size: 25px'>Espécie não especificada.</p>";
}

?>

</div>
</div><!-- /container -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
<br>
<div align="center">
  <a href="dash_avi.php?pagina=especie" role="button" class="btn btn-light btn-lg"> Voltar </a>
</div>
<br>
<?php include 'footer.php'  ?>
</html>
