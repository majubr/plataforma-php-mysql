<!DOCTYPE html>
<html>
<body>
    <form method="post" action="">
        <input type="text" name="number">
        <input type="submit" value="submit">
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verifica se o formulário foi submetido

            // Obtém o valor do campo de entrada de texto 'number'
            $number = $_POST['number'];

            // Exibe o valor do número
            echo "Número: " . $number . "<br>";

            // Gera um valor aleatório
            $var = rand();

            // Executa o comando Rscript com o valor do número como argumento
            $cmd = 'C:\\Program Files\\R\\R-4.0.3\\bin\\Rscript.exe C:\xampp\htdocs\datatable3\Rscript.R ' . $number;
            $output = '';
            $return_var = '';
            exec($cmd, $output, $return_var);

            // Verifica se a execução do comando foi bem sucedida
       
        }
    ?>
</body>
</html>
