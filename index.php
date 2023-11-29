<!doctype html>
<html lang="pt-br">

<style>
    .project-badge:hover img {
        transform: scale(1.1);
        transition: transform 0.3s;
    }
</style>
<?php include 'header.php' ?>
<div align="center">
    <h4 class="display-5 mb-4" style="font-size: 30px">Banco de dados da fauna da Serra Azul</h4>
    <h3 align="center" class="display-5 mb-4" style="font-size: 30px">Bem vindo(a), selecione a fonte de dados
        desejada</h3>
    <br>
    <br>
    <div class="container-fluid" align="center">
        <div class="row card-deck">
            <div class="col-md-4">
                <div class="card text-black btn btn-outline-success mb-4 sombra" style="max-width: 18rem;">
                    <div class="card-body text-center">
                        <h4 class="card-title" style="text-align: center;font-size: 10px">
                            <a href='lista_sp_mastofauna.php'> <img class="img-fluid" src="img/Myrmecophaga tridactyla.jpeg"></a>
                            <br>
                            <span class="display-5 mb-4" style="font-size: 25px">Mastofauna</span>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-black btn btn-outline-success mb-4 sombra" style="max-width: 18rem;">
                    <div class="card-body text-center">
                        <h4 class="card-title" style="text-align: center;font-size: 10px">
                            <a href='lista_sp_avifauna.php'> <img class="img-fluid" src="img/passeriforme.jpeg"></a>
                            <br>
                            <span class="display-5 mb-4" style="font-size: 25px">Avifauna</span>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-black btn btn-outline-success mb-4 sombra" style="max-width: 18rem;" id="sombra">
                    <div class="card-body text-center">
                        <h4 class="card-title" style="text-align: center;font-size: 10px">
                            <a href='lista_sp_herpetofauna.php'> <img class="img-fluid" src="img/Boana albopunctata.jpg"></a>
                            <span class="display-5 mb-4" style="font-size: 25px">Herpetofauna</span>
                            <br>

                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-black btn btn-outline-success mb-4 sombra" style="max-width: 18rem;" id="sombra">
                    <div class="card-body text-center">
                        <h4 class="card-title" style="text-align: center;font-size: 10px">
                            <a href='lista_sp_ictiofauna.php'> <img class="img-fluid" src="img/Astyanax_lacustris.jpg"></a>
                            <br>
                            <span class="display-5 mb-4" style="font-size: 25px">Ictiofauna</span>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-black btn btn-outline-success mb-4 sombra" style="max-width: 18rem;" id="sombra">
                    <div class="card-body text-center">
                        <h4 class="card-title" style="text-align: center;font-size: 10px">
                            <a href='em_producao_entomo.php'> <img class="img-fluid" src="img/borboleta.jpg"></a>
                            <br>
                            <span class="display-5 mb-4" style="font-size: 25px">Entomofauna</span>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-black btn btn-outline-success mb-4 sombra" style="max-width: 18rem;" id="sombra">
                    <div class="card-body text-center">
                        <h4 class="card-title" style="text-align: center;font-size: 10px">
                            <a href='carnivoros.php'> <img class="img-fluid" src="img/logo_pegadas_da_serra_sem_moldura.jpg"></a>
                            <br>
                            <span class="display-5 mb-4" style="font-size: 25px">Pegadas da Serra</span>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>




</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>
</body>
<br>
<?php include 'footer.php'  ?>

</html>