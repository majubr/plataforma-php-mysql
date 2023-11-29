<!DOCTYPE html>
<?php include 'header_imagens.php';
include 'conexao.php';
?>

            <h4 class="display-5 mb-4">Galeria de imagens da avifauna</h4>

            <p>Clique na imagem para aumentar e realizar download</p>

            <div class="row">
                <?php
                $fotos_dir = "imagens_avifauna/";
                $fotos = scandir($fotos_dir);

                foreach ($fotos as $foto) {
                    if ($foto == "." || $foto == "..") {
                        continue;
                    }
                    $sp = pathinfo($foto, PATHINFO_FILENAME);
                    $sql = "SELECT especie, nome_popular FROM avifauna WHERE especie='$sp'";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    $especie = $result['especie'];
                    $nome_popular = $result ['nome_popular'];
                    echo "<div class='col-md-3' style='padding: 4px;'>";
                    echo "<a href='#' onclick='exibirFoto(\"$fotos_dir/$foto\")'>";
                    echo "<img src='$fotos_dir/$foto' alt='$foto' class='img-enlarge'>";
                    echo "</a>";
                    echo "<div style='text-align:center;'> nome popular: $nome_popular <br> </div>";
                    echo "<div style='text-align:center;font-style:italic;'> $especie </div>";
                    echo "</div>";
                }
                ?>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php include 'footer.php'  ?>
</html>