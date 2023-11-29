$(document).ready(function() {
    $('#listar').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "listar_avi.php",
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"
        }
    });
});

const formNewUser = document.getElementById("form-cad-sp-herpeto");
//const fecharModalCad = new bootstrap.Modal(document.getElementById("cadSPModal"));
if (formNewUser) {
    formNewUser.addEventListener("submit", async(e) => {
        e.preventDefault();
        const dadosForm = new FormData(formNewUser);
        console.log(dadosForm);

        //const dados = await fetch("cadastrar_herpeto.php", {
           //method: "POST",
            //body: dadosForm
        });
       // const resposta = await dados.json();
        //console.log(resposta);

       // if (resposta['status']) {
           // document.getElementById("msgAlertErroCad").innerHTML = "";
            //document.getElementById("msgAlerta").innerHTML = resposta['msg'];
           // formNewUser.reset();
           // fecharModalCad.hide();
           // listarDataTables = $('#listar-usuario').DataTable();
          // listarDataTables.draw();
      // } else {
           // document.getElementById("msgAlertErroCad").innerHTML = resposta['msg'];
//}
    //});
}