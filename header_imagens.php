<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Banco de dados / Biodiversidade</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/default.css">
    <link rel="stylesheet" href="assets/component.css">
    <script src="assets/modernizr.custom.js"></script>

    <style>
        .btn-download {
            background-color: green;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
        }

        .img-enlarge {
            max-width: 190px;
            max-height: 190px;
            display: block;
            margin: auto;
            border: 2px solid green;
            border-radius: 10px;
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

</head>

<body>

    <div class="container">

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg" style="background-color: #7fdb27">
            <div class="container-fluid" style="background-color: #fff">
                <a href="https://www.usiminas.com/" class="navbar-brand">
                <img src="img/musa.png" alt="Logotipo Mineração" height="80px" id="logo-topo">
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

        <div class="text-center">