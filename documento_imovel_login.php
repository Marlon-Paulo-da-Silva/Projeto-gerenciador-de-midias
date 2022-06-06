<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sistema para controle de estoque</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  
  
  
</head>

<body>

    <!-- Navbar -->
    <?php include_once("./templates/header.php"); ?>
    

    <br/><br/>

    <div class="container">

        <?php
          if(isset($_GET["msg"]) AND !empty(isset($_GET["msg"]))){
            ?>
              
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                <?php echo $_GET["msg"]; ?>
              </div>
            <?php
          }


        ?>
        <div class="card mx-auto" style="width: 21rem;">
            <img class="card-img-top mx-auto" style="width: 60%;" src="https://rucri.com//images/Gerenciamento_de_midias_logo3.png" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"></h5>
                <form id="login_form" action="" method="post">
                    <div class="form-group">
                        <label for="log_email">E-mail</label>
                        <input type="email" class="form-control" name="log_email" id="log_email" aria-describedby="log_email" placeholder="Insira seu e-mail">
                        <small id="e_error" class="form-text text-muted">E-mail não confere</small>
                    </div>
                    <div class="form-group">
                        <label for="log_pass">Password</label>
                        <input type="password" class="form-control" id="log_pass" name="log_pass" placeholder="Insira sua senha">
                        <small id="p_error" class="form-text text-muted">Senha não confere</small>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Continuar conectado</label>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-lock">&nbsp;</i> Entrar</button>
                    <span><a href="registrar.php">Registrar</a></span>
                </form>
            </div>
            <div class="card-footer"><a href="#">Esqueceu a senha ?</a></div>
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