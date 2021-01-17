<?php

    $sql = "SELECT * FROM horarios WHERE disponible=1 and lugares_ocupados<25 LIMIT 1";
    $resultados_horarios = $enlace->query($sql);

    if (!($resultados_horarios)){
        $return_arr[] = array("success" => $resultados_update);
        echo json_encode($return_arr);
        exit(1);
    }

    
    if (mysqli_num_rows($resultados_horarios)==0) { 
        echo "No hay horarios disponibles";
        $return_arr[] = array("success" => $resultados_update);
        echo json_encode($return_arr);
        exit(1);
    }
  
    
    while($row = mysqli_fetch_array($resultados_horarios)) {
        
        $horario = $row['horario_id'];
        $lugares_ocupados = $row['lugares_ocupados'];
    
    }

?>