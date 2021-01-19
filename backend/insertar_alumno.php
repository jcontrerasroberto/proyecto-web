<?php

    require_once('openconnectiondb.php');
    $data = json_decode( file_get_contents( 'php://input' ), true );

    $horario = 0;
    $lugares_ocupados = 0;

    require_once('seleccion_horario.php'); 
    
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

    if (!$result){
        $return_arr[] = array("success" => $result);
        echo json_encode($return_arr);
        exit(1);
    }

    $lugares_ocupados++;

    $sql_update = "UPDATE horarios SET lugares_ocupados= '$lugares_ocupados' WHERE horario_id= $horario";
    $resultados_update= $enlace->query($sql_update);

    if (!$resultados_update){
        $return_arr[] = array("success" => $resultados_update);
        echo json_encode($return_arr);
        exit(1);
    }

    if ($lugares_ocupados==25){
        $sql_update = "UPDATE horarios SET disponible = 0 WHERE horario_id = $horario";
        $resultados_update = $enlace->query($sql_update);

        if (!($resultados_update)){
            $return_arr[] = array("success" => $resultados_update);
            echo json_encode($return_arr);
            exit(1);
        }
    }

    $return_arr[] = array("success" => $resultados_update , "id" => $data['boleta']);

    mysqli_stmt_close($accion);

    echo json_encode($return_arr);

    require_once('closeconnectiondb.php');

?>