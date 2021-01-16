<?php
    //$data = json_decode( file_get_contents( 'php://input' ), true ); 
    //echo json_encode(array("blablabla"=>$data));
    $enlace = mysqli_connect("127.0.0.1", "root", "root", "escomingreso");
    if (!$enlace) {
        exit;
    }
        

?>