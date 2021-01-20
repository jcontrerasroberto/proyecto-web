<?php


    require_once('openconnectiondb.php');
    $resultado = mysqli_query($enlace, "SELECT boleta, nombre, apellidop, apellidom, curp  FROM alumno");
    require_once('closeconnectiondb.php');

?>