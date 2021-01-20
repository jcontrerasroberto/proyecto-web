<?php
    $user = "admin";
    $password = "admin";

    if (strcmp($user, "admin")==0 && strcmp($password,"admin")==0){
        session_start();
        $_SESSION["user"]= "admin";
        $_SESSION['active'] = true;
        header("Location: ../vistas/admin.php");
        die();
    }else{
        echo json_encode(array("success"=>0));
    }
?>