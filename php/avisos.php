<?php
include("connect.php");

$query2 = "SELECT * FROM avisos WHERE date_format(expiracion, '%Y-%m-%d') >= date_format(now(), '%Y-%m-%d') ORDER BY expiracion";
$result2 = mysqli_query($link, $query2);

/* print results */
while($avisos = mysqli_fetch_array($result2)) {
  ?>
  <div data-role="collapsible">
    <h4><?php echo $avisos['titulo'] ?></h4>
    <?php echo $avisos['contenido'] ?>
  </div>
  <?php
}

mysqli_close($link);
?>
<!-- AS Framework - www.adlersystems.com -->