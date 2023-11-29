
<?php
// Código PHP para gerar a tabela com o DataTable do Google e adicionar estilo em itálico

// ...

echo '<table id="tabela">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>João</td>
            <td>joao@example.com</td>
            <td>(11) 1234-5678</td>
        </tr>
        <tr>
            <td>Maria</td>
            <td>maria@example.com</td>
            <td>(21) 9876-5432</td>
        </tr>
    </tbody>
</table>';

echo '<script>
        $(document).ready(function() {
            var tabela = $("#tabela").DataTable();
            tabela.column(0).nodes().to$().addClass("italic");
        });
    </script>';

echo '<style>
    .italic {
        font-style: italic;
    }
</style>';

// ...
?>



<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Banco de dados / Biodiversidade</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="assets/default.css" />
<link rel="stylesheet" href="assets/component.css" />
<script src="assets/modernizr.custom.js"></script>

</head>

<body>

    <div class="container">

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg" style="background-color: #7fdb27">
            <div class="container-fluid" style="background-color: #fff">
                <a href="https://www.usiminas.com/" class="navbar-brand">
                    <img src="logo usiminas.png" alt="Logotipo Usiminas" height="80px" id="logo-topo">
                </a>
                <a class="navbar-brand" href="#">Banco de dados de biodiversidade</a>

                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        <a class="nav-link" href="BD.php">Banco de dados</a>
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

        <div align="center">

            <h4 class="display-5 mb-4" style="font-size: 30px">Galeria de imagens da herpetofauna</h2>

                <a href="add_image_herpeto.php" role="button" class="btn btn-outline-success btn-lg"> Adicionar nova imagem ao banco </a>

                <br>
                <br>


                <?php
                $fotos_dir = "fotos_herpeto/";
                $fotos = scandir($fotos_dir);

                $num_colunas = 4;
                $colunas_preenchidas = 0;

                echo "<table>";
                foreach ($fotos as $foto) {
                    if ($foto == "." || $foto == "..") {
                        continue;
                    }

                    if ($colunas_preenchidas == 0) {
                        echo "<tr>";
                    }

                    echo "<td style='padding: 4px; border: 2px solid green;'>";
                    echo "<a href='#' onclick='exibirFoto(\"$fotos_dir/$foto\")'>";
                    echo "<img src='$fotos_dir/$foto' alt='$foto' style='max-width:150px;max-height:150px;display:block;margin:auto;'>";
                    echo "</a>";

                    $legenda = str_replace('.jpg', '', $foto);
                    $legenda = str_replace('.JPG', '', $foto);
                    $legenda = str_replace('.jpeg', '', $legenda);
                    $legenda = str_replace('.JPEG', '', $legenda);
                    $legenda = str_replace('.png', '', $legenda);
                    $legenda = str_replace('.PNG', '', $legenda);
                    echo "<div style='text-align:center;font-style:italic;'>$legenda</div>";
                    echo "</td>";

                    $colunas_preenchidas++;
                    if ($colunas_preenchidas == $num_colunas) {
                        echo "</tr>";
                        $colunas_preenchidas = 0;
                    }
                }

                if ($colunas_preenchidas > 0) {
                    for ($i = $colunas_preenchidas; $i < $num_colunas; $i++) {
                        echo "<td></td>";
                    }
                    echo "</tr>";
                }

                echo "</table>";
                ?>

                <style>
                    .btn-download {
                        background-color: green;
                        color: #fff;
                        padding: 10px;
                        border-radius: 5px;
                        text-decoration: none;
                        display: inline-block;
                    }
                </style>

                <script>
                    function exibirFoto(url) {
                        var janela = window.open("", "", "width=800,height=600");

                        janela.document.write("<style>body {margin:0;padding:0;}</style>");

                        janela.document.write("<img src='" + url + "' style='max-width:100%;max-height:80vh;margin:auto;display:block;'>");

                        janela.document.write("<div style='text-align:center;margin-top:10px;'><a href='" + url + "' download class='btn-download'>Download</a></div>");

                        // verificando se a imagem foi carregada corretamente
                        janela.document.getElementsByTagName('img')[0].addEventListener('error', function() {
                            alert('Erro ao carregar a imagem!');
                        });
                    }
                </script>
        </div>
</body>
<footer align="center">
    <a class="navbar-brand" href="https://primeconsultoriaambiental.com.br/"><img src="prime.jpg" height="40px"> </a>
    <br>
    <br>
    <p style="text-align: center;font-size: 10px"> NEXUS COMERCIO, MANUTENCAO E ELABORACAO DE SISTEMAS LTDA - Lavras Novas, MG / CONTATO@NEXUSMIND.COM.BR </p>

</footer>

</html>