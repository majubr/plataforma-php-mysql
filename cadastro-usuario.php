<html lang="en">



  <head>
    <title>Menu</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


  
  </head>
  <body>
    <div class="container" style="width: 400px;margin-top: 40px">
      <div style="text-align: right">
        <a  href="menu.php" role= "button" class = "btn btn-primary btn-sm">Voltar</a>
      </div>
      <h4>Cadastro de Usuário</h4>
      <form action = "_insert_usuario.php" method = "POST" >
        <div class = "form-group">
          <label>Nome do Usuário</label>
          <input type="text" name="nomeusuario" class="form-control" placeholder="Nome completo" required autocomplete="off">
        </div>
        <div class = "form-group">
          <label>E-mail</label>
          <input type="email" name="mailusuario" class="form-control" placeholder="Seu E-mail" required autocomplete="off">
        </div>
        <div class = "form-group">
          <label>Senha do Usuário</label>
          <input id="txtSenha" type="password" name="senhausuario" class="form-control" placeholder="Senha" required autocomplete="off">
        </div>
          <div class = "form-group">
          <label>Repetir senha do usuário</label>
          <input id="txtSenha" type="password" name="senhausuario2" class="form-control" placeholder="Repetir senha" oninput="validaSenha(this)" required autocomplete="off">
          <small>Precisa ser igual a senha digitada acima</small>
        </div>
  
      <div class="form-group">
        <label>Nível de Acesso</label>
        <select name="nivelusuario" class="form-control">
            <option value="1">Administrador</option>
            <option value="2">Editor</option>
            <option value="3">Usuario</option>
        </select>
      </div> 
      <div style ="text-align: right;">
              <button type="submit" class = "btn btn-sm btn-success">Cadastrar</button>
      </div>   
      
    </dir>
        </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript">
  
function validaSenha (input){ 
  if (input.value != document.getElementById('txtSenha').value) {
    input.setCustomValidity('Repita a senha corretamente');
  } else {
    input.setCustomValidity('');
  }
} 
</script>
  </body>
</html>