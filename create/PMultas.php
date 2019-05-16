<?php include('../manejoSesiones.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset= "utf8">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php include("../CargarEstilos2.php");?>
<title>Multas</title>
</head>

<body>
<?php include($_SERVER['DOCUMENT_ROOT']."/ControlVehicular/menubar.php"); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$Licencia = '';
	$Vehiculo = '';
	$idOficial = $_POST["idOficial"];
	$Monto = $_POST["Monto"];
	$Lugar = $_POST["Lugar"];
	$Hora = $_POST["Hora"];
	$Fecha = $_POST["Fecha"];
	$Motivo = $_POST["Motivo"];
	if(isset($_POST["Folio"])){
		print("Folio : ".$_POST["Folio"]."<br>");
	}
	if(isset($_POST["Vehiculo"])){	
		$Vehiculo = $_POST["Vehiculo"];
	}
	if(isset($_POST["Licencia"])){
		$Licencia = $_POST["Licencia"];	
	}

	

	include($_SERVER['DOCUMENT_ROOT']."/ControlVehicular/Conexion.php");
	$Con = Conectar();
	$SQL ="INSERT INTO multas VALUES('','$Licencia','$Vehiculo','$idOficial','$Monto','$Lugar','$Hora','$Fecha','$Motivo')";
	
	$entry=EjecutarConsulta($Con,$SQL);
  print("<div class='mensaje' >");
		if($entry==TRUE)	{
			$lineas=mysqli_affected_rows($Con);
			//respaldo en xml
			$id =mysqli_insert_id($Con);
			echo  "<script>window.open('http://localhost:9999/ControlVehicular/pdf/pdfMulta.php?id=".$id."', '_blank')</script>";
			$paths=parse_ini_file('../configuracion.ini');
			$xmlPath=$paths['xmlPath'];
			$multas=new SimpleXMLElement($xmlPath.'multas.xml',null,true);
			
			$nuevaMulta=$multas->addChild('multa');
			$nuevaMulta->addChild('folio',$id);
			$nuevaMulta->addChild('Licencia',$Licencia);
			$nuevaMulta->addChild('idOficial',$idOficial);
			$nuevaMulta->addChild('Monto',$Monto);
			$nuevaMulta->addChild('Lugar',$Lugar);
			$nuevaMulta->addChild('Hora',$Hora);
			$nuevaMulta->addChild('Fecha',$Fecha);
			$nuevaMulta->addChild('Motivo',$Motivo);

			//guardar los cambios
			$multas->asXML($xmlPath.'multas.xml');
			print("<span>".$lineas." registro completado</span>");
		}else{
			print("<span>0 registros completados</span>");
		}
    print("Datos ingresados: <br>");
    print("Licencia: ".$Licencia."<br>");
    print("Vehiculo: ".$Vehiculo."<br>");
    print("idOficial: ".$idOficial."<br>");
    print("Monto: ".$Monto."<br>");
    print("Lugar: ".$Lugar."<br>");
    print("Hora: ".$Hora."<br>");
    print("Fecha: ".$Fecha."<br>");
    print("Motivo: ".$Motivo."<br>");
  print("</div>");
	

	
	Desconectar($Con);
}
?>

</body>
</html>

