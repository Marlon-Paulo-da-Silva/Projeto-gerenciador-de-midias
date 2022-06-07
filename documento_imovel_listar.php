<?php

// if ($_GET['user'] != "marlon") {
//   header("Location: page_not_found.php");
// }
?>
<?php 
include_once 'connect.php';
require "./classes/midias.class.php";

$codigo_cad = 150;

?>

<?php

if (isset($_FILES['midias'])) {
  // $fotos = $_FILES['fotos'];
  echo "Mandou fotos";
} else {
  // $fotos = array();
}

$md = new Midias();


if (isset($_FILES['midias'])) {
  $id_usuario = 150;
  $id_imovel = 1005;
  $caminho = "midias/";

	$midias = $_FILES['midias'];
	
  
	$md->addMidia($midias, $caminho, $id_usuario, $id_imovel);
    die();
  // echo json_encode(var_dump($midias));
}
?>
<?php
  if(isset($_GET["msg"]) AND !empty(isset($_GET["msg"]))){
    ?>
      
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
        <?php echo $_GET["msg"]; ?>
      </div>
    <?php
  }
  
  $midias_rs = array();
  
  $midias_rs = $md->getMidias($codigo_cad);

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Gerenciador de Mídias</title>
</head>
<body>
  <header>
    <div class="cabecalho">
      <img style="height: 74px;margin-top: 10px;" src="https://rucri.com//images/Gerenciamento_de_midias_logo3.png" alt="" srcset="">
    </div>
  </header>

        

      <!-- The Modal -->
      <div id="myModal" class="modal">

        <!-- Modal content -->
        <form action="" method="Post" enctype="multipart/form-data" >
        <div class="modal-content">
          <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Adicione as Midias</h2>
          </div>
          <div class="modal-body">
            <label>Clique para adicionar arquivos</label>
            <input type="file" name="midias[]" multiple class="form-control-file" style="margin-bottom: 10px;" value="Adicionar arquivos">
            
          </div>
          <div class="modal-footer">
            <button class="btn" id="exampleModalLabel" style="background-color: #f0b55e;color: white;" type="submit">Salvar</button>
          </div>
        </form>
        </div>

      </div>
  
  <section style="padding: 15px;">
    <div class="cabecalho_painel">
      <h3 style="margin-right: 20px;">Gerenciador de Mídias</h3>
      
      <button class="btn" style="background-color: #144586;color: #f0b55e;" id="myBtn"><i class="fa-solid fa-upload"></i> Adicionar Mídia</button>
    </div>

    
    <div class="container" style=" border: 1px solid #f0b55e;border-radius: 7px;">
        <div class="row">
            <div class="col-lg-12 my-3">
                <div class="pull-right">
                    <div class="btn-group">
                        <button class="btn" style="background-color:  #144586;color: #f0b55e;border-right" id="list">
                          <i class="fas fa-list"></i>
                        </button>
                        <button class="btn" style="background-color: #144586;color: #f0b55e;border-left-color: #f0b55e;" id="grid">
                          <i class="fa-solid fa-border-all"></i>
                        </button>
                        <h2 style="color: #144586">&nbsp;Suas Mídias</h2>
                    </div>
                </div>
            </div>
        </div> 
        <div id="products" class="row view-group">
            <?php foreach ($midias_rs as $midia): ?>
                    <div class="item col-xs-4 col-lg-4">
                        <div class="thumbnail card">
                            <div class="img-event" style="max-height: 190px;overflow: hidden;align-self: center;">
                                <?php if($midia['tipo_do_arquivo'] == 'application/pdf'): ?>
                                    <div class="image" style="height: 183px;text-align: center;width: 509px;">
                                        <img class="group list-group-image img-fluid" style="height: 100px;margin-top: 36px;" src="/mod_documentos_imovel/midias/pdf-icon.png" alt="" />
                                    </div>

                                <?php elseif($midia['tipo_do_arquivo'] == 'image/png' || $midia['tipo_do_arquivo'] == 'image/jpeg'): ?>
                                    <img class="group list-group-image img-fluid" src="/mod_documentos_imovel/midias/<?php echo $midia['nome_temporario'];?>" alt="" />
                                <?php else: ?>
                                    <img class="group list-group-image img-fluid" src="https://w7.pngwing.com/pngs/256/756/png-transparent-question-mark-illustration-the-three-question-marks-pyramid-solitaire-saga-benevento-russo-duo-question-mark-blue-child-text.png" alt="" />
                                <?php endif; ?>
                            </div>
                            <div class="caption card-body">
                                <h4 class="group card-title inner list-group-item-heading">
                                    <?php echo substr($midia['nome_do_identificador'], 0, 20);?>...</h4>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <p class="lead">
                                            Data de envio: <?php echo $midia['data_de_upload'];?></p>
                                    </div>
                                    <div class="col-xs-12 col-md-6" style="display: flex;flex-direction: column;justify-content: space-around;">
                                        <a class="btn" style="background-color: #144586;color: #f0b55e;margin-bottom: 5px;" href="#"><i class="fa-solid fa-trash-can"></i> Excluir</a>
                                        <a class="btn" style="background-color: #144586;color: #f0b55e;" href="/mod_documentos_imovel/midias/<?php echo $midia['nome_temporario'];?>" download="<?php echo $midia['nome_do_identificador'];?>"><i class="fa-solid fa-download"></i> Baixar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php endforeach; ?>
                    
                
                    <!-- <div class="item col-xs-4 col-lg-4">
                        <div class="thumbnail card">
                            <div class="img-event">
                                <img class="group list-group-image img-fluid" src="http://placehold.it/400x250/000/fff" alt="" />
                            </div>
                            <div class="caption card-body">
                                <h4 class="group card-title inner list-group-item-heading">
                                    Product title</h4>
                                <p class="group inner list-group-item-text">
                                    Product description... Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                    sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <p class="lead">
                                            $21.000</p>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <a class="btn btn-success" href="http://www.jquery2dotnet.com">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
    </div>

  </section>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"  crossorigin="anonymous"></script>

  
  <!-- <script type="text/javascript" src="./js/functions.js"></script> -->
  <script>
    $(document).ready(function() {
            $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
            $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
        });
  </script>
  <script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
      modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>
</body>
</html>

<style>
  * {
    padding:0;
    margin:0;
    vertical-align:baseline;
    list-style:none;
    text-decoration: none;
    color: inherit;
    border:0
    font-family: "Ubuntu";
    }
    a {
      text-decoration: none;
    color: inherit;
    }
    header {
      background: #144586;
      width: 100%;
      height: 100px;
    }
    .cabecalho_painel{
      display: flex;
      align-items: center;
      margin-bottom: 22px;
    }
    .cabecalho{
      height: 100%;
      padding-left: 20px;
    }
  .layout{
  background: #144586;
  width: 100%;
  height: 100vh;
  left: 0;
  right: 0;
  display: grid;
  place-items: center;
  }
  .conectarml{
    background: #fff;
    width: 500px;
    height: 500px;
    margin-top: -250px;
    padding: 15px;
    border-radius: 5px;
    box-shadow: 0 0 10px 0 #00000070;
    text-align: center;
  }
  /* lista grid view */
  
  .container {
    margin-right: unset;
    margin-left: unset;
  }
  
  .view-group {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: row;
    flex-direction: row;
    padding-left: 0;
    margin-bottom: 0;
  }
  .thumbnail
  {
    margin-bottom: 30px;
    padding: 0px;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    border-radius: 0px;
  }
  
  .item.list-group-item
  {
    float: none;
    width: 100%;
    background-color: #fff;
    margin-bottom: 30px;
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
    max-width: 100%;
    padding: 0 1rem;
    border: 0;
  }
  .item.list-group-item .img-event {
    float: left;
    width: 30%;
  }
  
  .item.list-group-item .list-group-image
  {
    margin-right: 10px;
  }
  .item.list-group-item .thumbnail
  {
    margin-bottom: 0px;
    display: inline-block;
  }
  .item.list-group-item .caption
  {
    float: left;
    width: 70%;
    margin: 0;
    display: flex;
    flex-direction: column;
  }
  
  .item.list-group-item:before, .item.list-group-item:after
  {
    display: table;
    content: " ";
  }
  
  .item.list-group-item:after
  {
    clear: both;
  }
  /* Fim lista grid view */
  /* estilização Modal */
  /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 50%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s;
  
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color:  #144586;
  color: white;
  display:unset;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color:  #144586;
  color: white;
  justify-content: unset;
}
  /* FIM estilização Modal */

</style>
