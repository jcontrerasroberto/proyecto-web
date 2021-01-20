<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../vistas/inicio_sesion.html");
    die();
?>