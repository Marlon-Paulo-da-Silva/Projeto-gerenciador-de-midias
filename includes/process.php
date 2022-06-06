<?php
  include_once("../database/constants_dev.php");
  include_once("user.php");

  if(isset($_POST["username"]) AND isset($_POST["email"]) ){
    $user = new User();
    $result = $user->createUserAccount($_POST["username"], $_POST["email"], $_POST["password1"], $_POST["usertype"]);
    echo $result;
  } else {
    return "Falta dados";
  }
  
?>