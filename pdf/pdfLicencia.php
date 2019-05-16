<?php
$id = $_GET['id'];
require('../Conexion.php');
$Con = Conectar();
$result = EjecutarConsulta($Con,"SELECT * FROM licencias l, conductores c WHERE l.idLicencia = $id AND c.CURP = l.Conductor;");
Desconectar($Con);

$datos = mysqli_fetch_assoc($result);


require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage('P','Legal');
$pdf->SetFont('Arial','',8);
$pdf->Cell(15,15, $pdf->image('../img/qro.png',10,10,-270),0,'R');
$pdf->Cell(60,3,'Estados Unidos Mexicanos',0,2);
$pdf->Cell(60,3,utf8_decode('Poder Ejecutivo del Estado de Querétaro'),0,2);
#$pdf->MultiCell(100,4," \nPoder Ejecutivo del Estado de Querétaro",'LTRB','L',False);
#$pdf->Cell(40,10,'Secretaría de Seguridad Ciudadana',0,2);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(60,2,'',0,2);
$pdf->Cell(60,4,utf8_decode('Secretaría de Seguridad Ciudadana'),0,2);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(60,4,'Licencia para conducir',0,1);

$pdf->Cell(37,20,'','',1,'R');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(37,4,'No de licencia','',2,'R');

$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(255,0,0);
$pdf->Cell(37,4,$datos['idLicencia'],'',2,'R');

$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(37,4,"AUTOMOVILISTA",'',2,'R');

$pdf->Cell(70,4,"",'',2,'R');
$pdf->SetFont('Arial','',6);
$pdf->Cell(65,4,"Nombre",'',2,'R');


$pdf->SetFont('Arial','B',12);
$pdf->Cell(65,4,$datos['nombre'],'',2,'R');

$pdf->SetFont('Arial','',6);
$pdf->Cell(65,4,"Observaciones",'',2,'R');
$pdf->Cell(65,4,"Fecha de nacimiento",'',2,'L');

$pdf->SetFont('Arial','',9);
$pdf->Cell(65,4,$datos['fechaNacimiento'],'',2,'L');

$pdf->SetFont('Arial','',6);
$pdf->Cell(65,4,"Fecha de Expedicion",'',2,'L');

$pdf->SetFont('Arial','',9);
$pdf->Cell(65,4,$datos['Expedicion'],'',2,'L');

$pdf->SetFont('Arial','',6);
$pdf->Cell(30,4,"Valida hasta",'',0,'L');
$pdf->Cell(30,4,"Firma",'',1);

$pdf->SetFont('Arial','',9);
$pdf->Cell(30,4,$datos['Vencimiento'],'',0,'L');

$pdf->SetFont('Arial','',9);
$pdf->Cell(30,4,$datos['firma'],'',1,'L');

$pdf->SetFont('Arial','',6);
$pdf->Cell(65,4,"Antigüedad",'',2,'L');

$pdf->SetFont('Arial','',9);
$pdf->Cell(30,4,"2",'',1,'L');
$pdf->SetFont('Arial','B',15);
$pdf->SetFillColor(248,243,43);
$pdf->Cell(15,15,$datos['Tipo'],'',0,'C',True);
$pdf->SetFont('Arial','',8);
$pdf->Cell(60,4,"AUTORIZADO PARA QUE LA PRESENTE",'',1,'C');
$pdf->Cell(15,4,"",'',0,'C');
$pdf->Cell(60,4,"SEA RECABADA COMO GARANTÍA DE",'',1,'C');
$pdf->Cell(15,4,"",'',0,'C');
$pdf->Cell(60,4,"INFRACCIÓN",'',1,'C');
$pdf->image('../img/pau.jpg',50,28,25);

#Reverso de la licencia

$pdf->Cell(67,15,"",'',1);
$pdf->Cell(13,10,$pdf->image('../img/911.jpg',12,135,10),'');
$pdf->Cell(40,10,"B21125876",'',0);
$pdf->Cell(13,10,$pdf->image('../img/089.jpg',65,135,10),'',1);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(65,4,"Domicilio",'',1,'R');
$pdf->SetFont('Arial','',9);
$pdf->Cell(30,4,'','',0,'R');
$pdf->MultiCell(35,4,$datos['domicilio'],'');
$pdf->Cell(65,10,'','',2);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(33,4,'Restricciones','',0,'L');
$pdf->Cell(33,4,'Grupo Sanguineo','',1,'R');
$pdf->SetFont('Arial','',9);
$pdf->Cell(33,4,$datos['restriccion'],'',0,'L');
$pdf->Cell(33,4,$datos['gpoSanguineo'],'',1,'R');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(66,4,'Donador de órganos','',1,'R');
$pdf->SetFont('Arial','',9);
$pdf->Cell(66,4,$datos['donador'],'',1,'R');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(66,4,'Número de emergencias','',1,'R');
$pdf->SetFont('Arial','',9);
$pdf->Cell(66,4,$datos['telEmergencia'],'',1,'R');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(66,4,'M. EN. AP. JUAN MARCOS GRANADOS TORRES','',1,'R');
$pdf->Cell(66,4,'SECRETARIO DE SEGURIDAD CIUDADANA','',1,'R');
$pdf->Cell(66,4,'FUNDAMENTO LEGAL','',1,'L');
$pdf->SetFont('Arial','',5);
$pdf->Cell(66,4,'Artículo 19 fracción XIII y 33 fracció II de la Ley Orgánica del Poder Ejecutivo del','',1);
$pdf->Cell(66,4,'Estado de Querétaro, Artículo 9 fracción 12 y 55 de l aley de Trnásito del Estado','',1);
$pdf->Cell(66,4,'de Queretaro articulo 4 de la ley de procedimientos administrativos del estado','',1);
$pdf->Cell(66,4,'de Queretaro, articulo 28 del reglamento de transito del estado de Queretaro y ','',1);
$pdf->Cell(66,4,'articulo 6, fraccion 4, inciso b) y 20, fraccion 4 de la ley de la Secretaria de','',1);
$pdf->Cell(66,4,'Seguridad Ciudadana del estado de Queretaro.','',1);



$pdf->Output();
//$pdf->Output('F','MIPHP.PDF');
?>

