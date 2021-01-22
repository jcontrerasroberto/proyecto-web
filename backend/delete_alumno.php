<?php

    session_start();

    if (!isset($_SESSION['active']) || !$_SESSION['active']) {
        header("Location: ../vistas/sign_in.php?error=nosession");
        die();
    }

    require_once('openconnectiondb.php');
    $data = json_decode( file_get_contents( 'php://input' ), true );
    

    $accion = $enlace->prepare("DELETE FROM alumno WHERE boleta=?");
    $accion->bind_param('s', 
        $data['boleta']
    );

    $result = $accion->execute();

    if (!$result){
        $return_arr[] = array("success" => $result);
        echo json_encode($return_arr);
        exit(1);
    }

    

    $return_arr[] = array("success" => $result , "id" => $data['boleta'], "curp" => $data['curp']);

    echo json_encode($return_arr);

    require_once('closeconnectiondb.php');

?>