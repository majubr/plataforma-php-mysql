<?php
    $message = "";
    if (isset($_POST["submit"]))
    {
        $conn = mysqli_connect("localhost", "root", "", "fauna");

        $especie = mysqli_real_escape_string($conn, $_POST["sp"]);
        $familia = mysqli_real_escape_string($conn, $_POST["familia"]);


        $total_image = count($_FILES["image"]["tmp_name"]);
        for ($a = 0; $a < $total_image; $a++)
        {
        	$tmp_name = $_FILES["image"]["tmp_name"][$a];
	    	$file_name = $_FILES["image"]["name"][$a];
	        $file_path = "uploads/" . $file_name;

	        $sql = "INSERT INTO herpeto_imagens(especie, familia, path) VALUES('$sp', '$familia', '" . $file_name . "')";
	        mysqli_query($conn, $sql);
	        move_uploaded_file($tmp_name, $file_path);
        }
        $message = "Image has been uploaded";
    }
?>

<html>
    <head>
        <title>Adicionar imagem</title>
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="assets/bootstrap.css" />

        <script src="assets/jquery-1.11.3.min.js"></script>
        <script src="assets/bootstrap.js"></script>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <h1>Adicione uma imagem ao banco</h1>

                    <?php if (!empty($message)) { ?>
                        <div class="alert alert-success"><?php echo $message; ?></div>
                    <?php } ?>

                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Espécie</label>
                            <input type="text" name="sp" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label>Família</label>
                            <textarea name="familia" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Escolha um arquivo</label>
                            <input type="file" name="image[]" multiple accept="image/*" class="form-control" required />
                        </div>
                        <input type="submit" name="submit" value="Add" class="btn btn-success" />
                    </form>
                    <br>
                    <div align="center">
                  <a href="imagens_herpetofauna.php" role="button" class = "btn btn-light btn-lg"> Voltar </a>
                    </div>
    </body>
                </div>
            </div>
        </div>
    </body>
</html>