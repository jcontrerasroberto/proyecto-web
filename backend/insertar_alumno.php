<?php

    require_once('openconnectiondb.php');
    $data = json_decode( file_get_contents( 'php://input' ), true );  
    $horario = 5;
    $sexo = 0;
    $n_opcion = 0;
    
    $data['sexo']=="masculino" ? $sexo=0 : $sexo=1;
    if ($data["escom"]=="primera") $n_opcion = 1;
    if ($data["escom"]=="segunda") $n_opcion = 2;
    if ($data["escom"]=="tercera") $n_opcion = 3;
    if ($data["escom"]=="cuarta") $n_opcion = 4;

    $accion = mysqli_prepare($enlace, "INSERT INTO alumno VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($accion, 'sssssisssisssssdii', 
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
        $horario
    );

    $result = mysqli_stmt_execute($accion);

    $return_arr[] = array("success" => $result);

    mysqli_stmt_close($accion);


    echo json_encode($return_arr);

    require_once('closeconnectiondb.php');

?>