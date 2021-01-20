<?php
    $user = $_POST["user"];
    $password = $_POST["password"];

    if (strcmp($user, "admin")==0 && strcmp($password,"admin")==0){
        session_start();
        $_SESSION["user"]= "admin";
        $_SESSION['active'] = true;
        header("Location: ../vistas/admin.php");
        die();
    }else{
        header("Location: ../vistas/sign_in.php?error=wrongkeys");
        die();
    }
?>