<?php
    require_once('openconnectiondb.php');
    $data = json_decode( file_get_contents( 'file.txt' ), true ); 
    print_r($data);
    foreach($data as $key => $campo){
        echo $key . " = " . $campo . "\n";
    }
    require_once('closeconnectiondb.php');
?>