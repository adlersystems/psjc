<?php
  /*$link = mysqli_connect("localhost", "sjc_app", "Carmelitas_1", "sjc_app");*/
  
  $link = mysqli_connect("localhost", "root", "", "sjc_app");
  
  /* verificar la conexión */
  if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
  }
?>

<!-- AS Framework - www.adlersystems.com -->