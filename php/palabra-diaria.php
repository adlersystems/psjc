<?php
  include("connect.php");
 /* include("get-date.php");*/
  
  $fecha = date("Y-m-d");
  
  $query = "SELECT * FROM palabra WHERE date_format(fecha, '%Y-%m-%d') = date_format(now(), '%Y-%m-%d')";
  $result = mysqli_query($link, $query);
  
  $palabra = mysqli_fetch_array($result, MYSQLI_BOTH);
  
  echo $palabra["contenido"];
  
  mysqli_close($link);
?>
<!-- AS Framework - www.adlersystems.com -->