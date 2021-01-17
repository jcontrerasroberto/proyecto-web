<?php
    //require_once("openconnection.php");
    include("./fpdf182/fpdf.php");

    class PDF extends FPDF
    {
        // Cabecera de página
        function Header()
        {
            // Logo
            $this->Image('../public/header.png',10,8,200);
            $this->Ln(20);
        }

    }

    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->SetFont('Helvetica','',12);
    $pdf->Output();

    //require_once("closeconnection.php");
?>