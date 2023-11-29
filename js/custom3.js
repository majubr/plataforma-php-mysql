$(document).ready(function() {
    $('#listar_dc').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "listar_sp2.php",
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
