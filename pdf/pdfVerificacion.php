<?php 
require('../Conexion.php');
$Folio=$_GET["folio"];
$Con = Conectar();
$SQL="SELECT * FROM Verificaciones WHERE Folio = $Folio;";
$result = EjecutarConsulta($Con,$SQL);
Desconectar($Con);

$datos=mysqli_fetch_assoc($result);
$Vehiculo=$datos['Vehiculo'];
$Fecha=$datos['Fecha'];
$Periodo=$datos['Periodo'];
$Dictamen=$datos['Dictamen'];

require('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'Verificacion #'.$Folio,0,1);


$pdf->SetFont('Arial','B',12);
$pdf->Cell(35,5,"Folio:",0,0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(30,5,$Folio,0,1);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(35,5,"Vehiculo:",0,0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(30,5,$Vehiculo,0,1);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(35,5,"Fecha:",0,0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(30,5,$Fecha,0,1);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(35,5,"Periodo:",0,0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(30,5,$Periodo,0,1);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(35,5,"Dictamen:",0,0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(30,5,$Dictamen,0,1);

require('barcode.php');
$filepath="codigoVerificacion.png";
$text=$datos['Folio'];
$size=20;
$orientation="horizontal";
$code_type="Code39";
$print=true;
$sizefactor="1";

barcode($filepath, $text, $size, $orientation, $code_type, $print,$sizefactor);
$pdf->Image($filepath,170,10,0,0,'PNG');

$pdf->Output();
?>