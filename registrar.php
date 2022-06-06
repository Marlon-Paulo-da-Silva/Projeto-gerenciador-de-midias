<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Gerenciador de Mídias</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  
  
</head>

<body>

    <!-- Navbar -->
    <?php include_once("./templates/header.php"); ?>

    <br/><br/>

    

    <div class="container">
    <div class="card mx-auto" style="width: 30rem;">
        <div class="card-header">
          Registrar
        </div>
        <div class="card-body">
          <form id="register_form" onsubmit="return false" autocomplete="off">
          <div class="form-group">
            <label for="username">Nome completo</label>
            <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Digite seu nome">
            <small id="u_error" class="form-text text-muted"></small>
          </div>

          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" placeholder="Digite seu e-mail">
            <small id="e_error" class="form-text text-muted"></small>
          </div>

          <div class="form-group">
            <label for="password1">Senha</label>
            <input type="password" class="form-control" id="password1" placeholder="Digita sua senha">
            <small id="p1_error" class="form-text text-muted"></small>
          </div>
          
          <div class="form-group">
            <label for="password2">Confirmação de Senha</label>
            <input type="password" class="form-control" id="password2" placeholder="Digita sua senha novamente">
            <small id="p2_error" class="form-text text-muted"></small>
          </div>
          
                
          <div class="form-group">
            <label for="usertype">Tipo de usuário</label>
            <select name="usertype" class="form-control" id="usertype">
              <option value="">Escolha o tipo de usuário</option>
              <option value="1">Administrador</option>
              <option value="0">Outro</option>
            </select>
            <small id="t_error" class="form-text text-muted"></small>
          </div>
                   
          <button type="submit" name="user_register" class="btn btn-primary"><span class="fa fa-user"></span>&nbsp;Registrar</button>
          <span><a href="index.php">Entrar</a></span>
        </form>
        </div>
        <div class="card-footer text-muted">
        </div>
      </div>
     
    </div>

    
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
  integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
  integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>
  <script type="text/javascript" src="./js/functions.js"></script>
</body>

</html>