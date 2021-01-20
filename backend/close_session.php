<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../vistas/sign_in.php");
    die();
?>