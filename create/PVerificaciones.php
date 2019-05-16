<?php include('../manejoSesiones.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset= "utf8">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php include("../CargarEstilos2.php");?>
<title>Untitled Document</title>
</head>

<body>
<?php include($_SERVER['DOCUMENT_ROOT']."/ControlVehicular/menubar.php"); ?>

<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$Vehiculo = $_POST["Vehiculo"]; 
	$Fecha = $_POST["Fecha"];
	$Periodo = $_POST["Periodo"];
	$Dictamen = $_POST["Dictamen"];
	if(isset($_POST["Folio"])){
	print("Folio: ".$_POST["Folio"]."<br>");	
}
		

				
include($_SERVER['DOCUMENT_ROOT']."/ControlVehicular/Conexion.php");
	$Con = Conectar();
	$SQL = "INSERT INTO Verificaciones (folio, vehiculo, fecha, periodo, dictamen)
	VALUES ('','$Vehiculo','$Fecha','$Periodo','$Dictamen')";
	$entry=EjecutarConsulta($Con,$SQL);

  print("<div class='mensaje'>");
	if($entry==TRUE)	{
		$lineas=mysqli_affected_rows($Con);
		$folio=mysqli_insert_id($Con);
		$id =mysqli_insert_id($Con);
		echo  "<script>window.open('http://localhost:9999/ControlVehicular/pdf/pdfVerificacion.php?folio=".$id."', '_blank')</script>";
		$paths=parse_ini_file('../configuracion.ini');
		$xmlPath=$paths['xmlPath'];
		$verificaciones=new SimpleXMLElement($xmlPath.'verificaciones.xml',null,true);
		$nuevaVerificaion=$verificaciones->addChild('verificacion');
		$nuevaVerificaion->addChild('folio',$folio);
		$nuevaVerificaion->addChild('vehiculo',$Vehiculo);
		$nuevaVerificaion->addChild('fecha',$Fecha);
		$nuevaVerificaion->addChild('periodo',$Periodo);
		$nuevaVerificaion->addChild('dictamen',$Dictamen);
		$verificaciones->asXML($xmlPath.'verificaciones.xml');


		print("<span>".$lineas." registro completado</span>");
	}else{
		print("<span>0 registros completados</span>");
	}
  print("Datos ingresados: <br>");
  print("Vehiculo: ".$Vehiculo."<br>");
  print("Fecha: ".$Fecha."<br>");
  print("Periodo: ".$Periodo."<br>");
  print("Dictamen: ".$Dictamen."<br>");
  print("</div>");
	Desconectar($Con);
}
?> 

