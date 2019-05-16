<?php include('../manejoSesiones.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset= "utf8">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php include("../CargarEstilos2.php");?>
<title>Propietarios</title>
</head>

<body>
<?php include($_SERVER['DOCUMENT_ROOT']."/ControlVehicular/menubar.php"); ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	//recibir variables
	$RFC = $_POST["RFC"];
	$CURP = $_POST["CURP"];
	$Nombre = $_POST["Nombre"];
	$Direccion = $_POST["Direccion"];

	//enviar sql
	include($_SERVER['DOCUMENT_ROOT']."/ControlVehicular/Conexion.php");

	$Con=Conectar();
	$SQL = "INSERT INTO propietarios VALUES('$RFC','$CURP','$Nombre','$Direccion')";
	$entry=EjecutarConsulta($Con,$SQL);
  print("<div class='mensaje'>");
	if($entry==TRUE)	{
		$lineas=mysqli_affected_rows($Con);
		print("<span>".$lineas." registro completado</span>");
	}else{
		print("<span>0 registros completados</span>");
	}
	Desconectar($Con);
  print("Datos ingresados:<br>");
  print("RFC: ".$RFC."<br>");
  print("CURP: ".$CURP."<br>");
  print("Nombre: ".$Nombre."<br>");
  print("Direccion: ".$Direccion."<br>");
  print("</div>");
}
	
?>

  
</body>
</html>