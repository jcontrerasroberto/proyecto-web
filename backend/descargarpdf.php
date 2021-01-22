<?php
    require_once("openconnectiondb.php");
    include("./fpdf182/fpdf.php");
    $boleta = $_POST["boleta"];
    $curp = $_POST["curp"];
    mysqli_set_charset($enlace,"utf8");
    $consulta = "SELECT * FROM alumno WHERE boleta='$boleta' AND curp='$curp'";
    $respuesta = $enlace->query($consulta);
    $row = $respuesta->fetch_assoc();
    $horario = $row['horario_id'];
    $consulta2 = "SELECT * FROM horarios WHERE horario_id='$horario'";
    $respuesta2 = $enlace->query($consulta2);
    $row2 = $respuesta2->fetch_assoc();

    class PDF extends FPDF
    {
        // Cabecera de página
        function Header()
        {
            // Logo
            $this->Image('../public/header.png',3,8,200);
            $this->Ln(20);
        }

    }

    $pdf = new PDF();

    $pdf->AddPage();

    $pdf->SetFillColor(84, 153, 199);
    $pdf->SetMargins(16, 25 , 16);
    $pdf->SetFont('Helvetica','B',14);
    $pdf->Cell(50);
    
    $nombre=$row['nombre'];
    $apellidop=$row['apellidop'];
    $apellidom=$row['apellidom'];
    $inicio=$row2['hora_inicio'];
    $fin=$row2['hora_fin'];
    
    $pdf->Cell(30, 30, '', 0, 1, 'L', 0);
    $pdf->Cell(20);
    $pdf->Cell(30, 10,'Horario',1,0,'C',1);
    $pdf->Cell(50, 10, "$inicio - $fin", 1, 0, 'C', 0);
    $pdf->Cell(30, 10,'Salon',1,0,'C',1);
    $pdf->Cell(30, 10, $row2['salon'], 1, 1, 'C', 0);
    $pdf->Cell(5, 5, '', 0, 1, 'L', 0);
    $pdf->Cell(14);
    $pdf->Cell(30, 10,'No olvides usar cubrebocas, careta y mantener tu sana distancia',0,1,'',0);
    $pdf->SetFont('Helvetica','B',12);
    $pdf->Cell(30, 10, 'Nombre: ', 0, 0, 'L', 0);
    $pdf->SetFont('Helvetica','',12);
    $pdf->Cell(30, 10, utf8_decode("$nombre $apellidop $apellidom"), 0, 1, 'L', 0);
    $pdf->SetFont('Helvetica','B',12);
    $pdf->Cell(30, 10, 'Boleta: ', 0, 0, 'L', 0);
    $pdf->SetFont('Helvetica','',12);
    $pdf->Cell(30, 10, $row['boleta'], 0, 1, 'L', 0);
    $pdf->SetFont('Helvetica','B',12);
    $pdf->Cell(30, 10, 'CURP: ', 0, 0, 'L', 0);
    $pdf->SetFont('Helvetica','',12);
    $pdf->Cell(30, 10, $row['curp'], 0, 1, 'L', 0);
    $pdf->SetFont('Helvetica','B',12);
    $pdf->Cell(45, 10, 'Fecha de nacimiento: ', 0, 0, 'L', 0);
    $pdf->SetFont('Helvetica','',12);
    $pdf->Cell(30, 10, $row['daten'], 0, 1, 'L', 0);
    $pdf->SetFont('Helvetica','B',12);
    $pdf->Cell(30, 10, 'Sexo: ', 0, 0, 'L', 0);
    $pdf->SetFont('Helvetica','',12);
    $sexo= $row['sexo'];
    if($sexo==0){
        $pdf->Cell(30, 10,'Masculino', 0, 1, 'L', 0);
    }
    else{
        $pdf->Cell(30, 10,'Femenino', 0, 1, 'L', 0);
    }
    $pdf->SetFont('Helvetica','B',12);
    $pdf->Cell(30, 10, 'Calle: ', 0, 0, 'L', 0);
    $pdf->SetFont('Helvetica','',12);
    $pdf->Cell(30, 10, utf8_decode($row['calle']), 0, 1, 'L', 0);
    $pdf->SetFont('Helvetica','B',12);
    $pdf->Cell(30, 10, 'Colonia: ', 0, 0, 'L', 0);
    $pdf->SetFont('Helvetica','',12);
    $pdf->Cell(30, 10, utf8_decode($row['colonia']), 0, 1, 'L', 0);
    $pdf->SetFont('Helvetica','B',12);
    $pdf->Cell(30, 10, utf8_decode('Código Postal: '), 0, 0, 'L', 0);
    $pdf->SetFont('Helvetica','',12);
    $pdf->Cell(30, 10, $row['codpostal'], 0, 1, 'L', 0);
    $pdf->SetFont('Helvetica','B',12);
    $pdf->Cell(30, 10, utf8_decode('Teléfono: '), 0, 0, 'L', 0);
    $pdf->SetFont('Helvetica','',12);
    $pdf->Cell(30, 10, $row['tel'], 0, 1, 'L', 0);
    $pdf->SetFont('Helvetica','B',12);
    $pdf->Cell(30, 10, 'Correo: ', 0, 0, 'L', 0);
    $pdf->SetFont('Helvetica','',12);
    $pdf->Cell(30, 10, utf8_decode($row['correo']), 0, 1, 'L', 0);
    $pdf->SetFont('Helvetica','B',12);
    $pdf->Cell(50, 10, 'Escuela de procedencia: ', 0, 0, 'L', 0);
    $pdf->SetFont('Helvetica','',12);
    $pdf->Cell(30, 10, utf8_decode($row['escuela']), 0, 1, 'L', 0);
    $pdf->SetFont('Helvetica','B',12);
    $pdf->Cell(40, 10, 'Entidad Federativa: ', 0, 0, 'L', 0);
    $pdf->SetFont('Helvetica','',12);
    $pdf->Cell(30, 10, utf8_decode($row['entidad']), 0, 1, 'L', 0);
    $pdf->SetFont('Helvetica','B',12);
    $pdf->Cell(30, 10, 'Promedio: ', 0, 0, 'L', 0);
    $pdf->SetFont('Helvetica','',12);
    $pdf->Cell(30, 10, $row['promedio'], 0, 1, 'L', 0);
    $pdf->SetFont('Helvetica','B',12);
    $pdf->Cell(30, 10, 'ESCOM fue tu: ', 0, 0, 'L', 0);
    $pdf->SetFont('Helvetica','',12);
    $op= $row['escom'];
    if($op==1){
        $pdf->Cell(30, 10,utf8_decode('PRIMERA opción'), 0, 1, 'L', 0);
    }
    elseif ($op==2){
        $pdf->Cell(30, 10,utf8_decode('SEGUNDA opción'), 0, 1, 'L', 0);
    }
    else {
        $pdf->Cell(30, 10,utf8_decode('TERCERA opción'), 0, 1, 'L', 0);
    }
    
    require_once("closeconnectiondb.php");
    $pdf->Output();
?>
