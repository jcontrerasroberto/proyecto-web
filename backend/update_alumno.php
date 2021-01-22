<?php

    session_start();

    if (!isset($_SESSION['active']) || !$_SESSION['active']) {
        header("Location: ../vistas/sign_in.php?error=nosession");
        die();
    }

    require_once('openconnectiondb.php');
    $data = json_decode( file_get_contents( 'php://input' ), true );


    
    $sexo = 0;
    $n_opcion = 0;
    
    
    $data['sexo']=="masculino" ? $sexo=0 : $sexo=1;
    
    
    if ($data["escom"]=="primera") $n_opcion = 1;
    if ($data["escom"]=="segunda") $n_opcion = 2;
    if ($data["escom"]=="tercera") $n_opcion = 3;
    if ($data["escom"]=="cuarta") $n_opcion = 4;
    
    

    $accion = $enlace->prepare("UPDATE alumno SET boleta=?, nombre=?, apellidop=?, apellidom=?, daten=?, sexo=?, curp=?, calle=?, colonia=?, codpostal=?, tel=?, correo=?, escuela=?, entidad=?, nombreE=?, promedio=?, escom=? WHERE boleta=?");
    $accion->bind_param('sssssisssisssssdis', 
        $data['boleta'],
        $data['nombre'],
        $data['apellidop'],
        $data['apellidom'],
        $data['daten'],
        $sexo,
        $data['curp'],
        $data['calle'],
        $data['colonia'],
        $data['codpostal'],
        $data['tel'],
        $data['correo'],
        $data['escuela'],
        $data['entidad'],
        $data['nombreE'],
        $data['promedio'],
        $n_opcion,
        $data['boletaOriginal']
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