<?php
class Database{
  private $con;
  public function connect(){
    // Crie um arquivo de Constants para Ambiente de produção
    // include_once("constants.php");

    //Ambiente de desenvolvimento
    include_once("constants_dev.php");
    $this->con = new Mysqli(HOST, USER, PASS, DB);
    
    if($this->con) {
      return $this->con;
    } 
    return "DATABASE_CONNECTION_FAIL";
  }
}

$db = new Database();
$db->connect();

?>