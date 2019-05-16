<?php
$id = $_GET['id'];
require('../Conexion.php');
$Con = Conectar();
$result = EjecutarConsulta($Con,"SELECT * FROM Multas WHERE Folio = $id;");

Desconectar($Con);


$datos = mysqli_fetch_assoc($result);
$Folio=$datos['Folio'];
$noLicencia = $datos['Licencia'];
$Vehiculo = $datos['Vehiculo'];
$idOficial = $datos['idOficial'];
$Monto = $datos['Monto'];
$Lugar = $datos['Lugar'];
$Hora = $datos['Hora'];
$Fecha = $datos['Fecha'];
$Motivo = $datos['Motivo'];


//$codigoBarras=barcode( $filepath, $text, $size, $orientation, $code_type, $print, $sizefactor );


require('fpdf/fpdf.php');


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'Multa #'.$Folio,0,1);


$pdf->SetFont('Arial','B',12);
$pdf->Cell(35,5,"#Licencia:",0,0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(30,5,$noLicencia,0,1);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(35,5,"ID Oficial:",0,0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(30,5,$idOficial,0,1);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(35,5,"Monto:",0,0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(30,5,"$".$Monto,0,1);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(35,5,"Lugar:",0,0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(30,5,utf8_decode($Lugar),0,1);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(35,5,"Hora:",0,0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(30,5,$Hora,0,1);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(35,5,"Fecha:",0,0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(30,5,$Fecha,0,1);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(35,5,"Motivo:",0,0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(30,5,utf8_decode($Motivo),0,1);


require('barcode.php');
$filepath="codigoMulta.png";
$text=$datos['Folio'];
$size=40;
$orientation="horizontal";
$code_type="Code39";
$print=true;
$sizefactor="1";

barcode($filepath, $text, $size, $orientation, $code_type, $print,$sizefactor);
$pdf->Image($filepath,170,10,0,0,'PNG');

$pdf->Output();
?>