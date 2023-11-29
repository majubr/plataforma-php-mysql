<!DOCTYPE html>
<html>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#listar').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "listar_lobo.php",
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"
            },
            "columnDefs": [{
                "targets": 21, // Índice da coluna "coletor"
                "render": function(data, type, row, meta) {
                    var nomeConsultor = row[21]; // Valor da coluna "coletor"
                    var linkConsultor = "consultores.php?search=" + nomeConsultor; // Substitua com o link correto
                    return '<a href="' + linkConsultor + '">' + nomeConsultor + '</a>';
                }
            }]
        });
    });
</script>

<?php include 'header.php' ?>
<div class='container' style="margin-top:40px">

<h2 align="center" class="display-5 mb-4" style="font-size: 30px; font-family: 'Saira', sans-serif; font-weight: 800;">Projetos Carnívoros</h2>
<div class="text-center">
    <img src="img/logo_pegadas_da_serra_sem_moldura.jpg" alt="Imagem de um lobo" style="width: 22.22%;">
</div>
    <br>
     <br>

<h4 align='center' class="display-5 mb-4" style="font-size: 30px">Tabela de dados</h4>
<br>
<br>
<div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div>
                    <a href="animais_monitorados.php" role="button" class="btn btn-outline-success btn-lg"> Ir para Animais monitorados </a>
                </div>
                <br>
                <div>
                    <a href="analise_pegadas.php" role="button" class="btn btn-outline-success btn-lg"> Ir para Analise de dados </a>
                </div>
                <br>
                <div>
                <a href="" role="button" class="btn btn-outline-success btn-lg"> Tratamento de dados (em construção) </a>
                </div>
                <div>
                    <br>
                    <a href="carnivoros.php" role="button" class="btn btn-outline-success btn-lg"> Ir para o Projeto Pegadas da Serra</a>
                </div>

            </div>
            <div class="col-md-4">
                <div>
                    <div>
                        <div align="right">
                            <a href="carnivoros.php"> <img class="d-block w-100" src="img/sirius_pose.jpeg"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>



    <br>
     <br>
      <br>


    <div class="table-responsive">
        <table id="listar" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>projeto</th>
                    <th>individuo</th>
                    <th>ano</th>
                    <th>datas</th>
                    <th>hora</th>
                    <th>classe</th>
                    <th>ordem</th>
                    <th>família</th>
                    <th>gênero</th>
                    <th>espécie</th>
                    <th>nome popular</th>
                    <th>COPAM 2014</th>
                    <th>MMA 2022</th>
                    <th>IUCN 2022</th>
                    <th>número de indivíduos</th>
                    <th>região</th>
                    <th>ponto amostral</th>
                    <th>metodologia</th>
                    <th>latitude</th>
                    <th>longitude</th>
                    <th>campanha</th>
                    <th>coletor</th>
                    <th>especialidade</th>
                    <th>empresa</th>
                    <th>obs</th>


                </tr>

            </thead>

        </table>
        </body>


        <a href="carnivoros.php" role="button" class="btn btn-sm btn-primary"> Voltar </a>
    </div>

</div>

</div>
</div>
</div>
<br>


<!-- JavaScript Bundle with Popper -->


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>


</body>
<?php include 'footer.php'  ?>

</html>