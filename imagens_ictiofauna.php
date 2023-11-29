<!DOCTYPE html>
<?php include 'header_imagens.php' ?>

            <h4 class="display-5 mb-4">Galeria de imagens da ictiofauna</h4>

            <p>Clique na imagem para aumentar e realizar download</p>

            <div class="row">
                <?php
                $fotos_dir = "imagens_ictiofauna/";
                $fotos = scandir($fotos_dir);

                foreach ($fotos as $foto) {
                    if ($foto == "." || $foto == "..") {
                        continue;
                    }

                    $legenda = pathinfo($foto, PATHINFO_FILENAME);

                    echo "<div class='col-md-3' style='padding: 4px;'>";
                    echo "<a href='#' onclick='exibirFoto(\"$fotos_dir/$foto\")'>";
                    echo "<img src='$fotos_dir/$foto' alt='$foto' class='img-enlarge'>";
                    echo "</a>";
                    echo "<div style='text-align:center;font-style:italic;'>$legenda</div>";
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