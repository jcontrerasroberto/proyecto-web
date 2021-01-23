<?php


    require_once('openconnectiondb.php');
    $resultado = mysqli_query($enlace, "SELECT boleta, nombre, apellidop, apellidom, curp  FROM alumno ORDER BY apellidop");
    require_once('closeconnectiondb.php');

?>
