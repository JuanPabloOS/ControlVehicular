<?php include('../manejoSesiones.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset= "utf8">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php include("../CargarEstilos2.php");?>
<title>Vehiculos</title>
</head>

<body>
<?php include($_SERVER['DOCUMENT_ROOT']."/ControlVehicular/menubar.php"); ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$idVehiculo = '';
$Propietario =$_POST["Propietario"];
$Placa =$_POST["Placa"];
$Tipo =$_POST["Tipo"];
$Uso =$_POST["Uso"];
$Annio =$_POST["Annio"];
$Color =$_POST["Color"];
$Puertas =$_POST["Puertas"];
$Modelo =$_POST["Modelo"];
$Marca =$_POST["Marca"];
$Transmision =$_POST["Transmision"];
$capCarga =$_POST["capCarga"];
$Serie =$_POST["Serie"];
$numMotor =$_POST["numMotor"];
$Linea =$_POST["Linea"];
$Sublinea =$_POST["Sublinea"];
$Cilindraje =$_POST["Cilindraje"];
$Combustible =$_POST["Combustible"];
$Origen =$_POST["Origen"];



//guardar datos
include($_SERVER['DOCUMENT_ROOT']."/ControlVehicular/Conexion.php");
	$Con = Conectar();
	$SQL = "INSERT INTO vehiculos 
	VALUES('$idVehiculo','$Propietario','$Placa','$Tipo','$Uso','$Annio','$Color','$Puertas','$Modelo','$Marca','$Transmision','$capCarga','$Serie','$numMotor','$Linea','$Sublinea','$Cilindraje','$Combustible','$Origen')";
	$entry=EjecutarConsulta($Con,$SQL);
  
  print("<div class='mensaje'>");
	if($entry==TRUE)	{
		$lineas=mysqli_affected_rows($Con);
		print("<span>".$lineas." Registro completado</span><br>");
	}else{
		print("<span>Registro no completado</span><br>");
	}
Desconectar($Con);
	 print("Datos ingresados:<br>");
    if(isset($_POST["idVehiculo"])){
    print("idVehiculo: ".$_POST["idVehiculo"]."<br>");
    $idVehiculo = $_POST["idVehiculo"]; 
    }
    print("Propietario: ".$Propietario."<br>");
    print("Placa: ".$Placa."<br>");
    print("Tipo: ".$Tipo."<br>");
    print("Uso: ".$Uso."<br>");
    print("Annio: ".$Annio."<br>");
    print("Color: ".$Color."<br>");
    print("Puertas: ".$Puertas."<br>");
    print("Modelo: ".$Modelo."<br>");
    print("Marca: ".$Marca."<br>");
    print("Transmision: ".$Transmision."<br>");
    print("capCarga: ".$capCarga."<br>");
    print("Serie: ".$Serie."<br>");
    print("numMotor: ".$numMotor."<br>");
    print("Linea: ".$Linea."<br>");
    print("Sublinea: ".$Sublinea."<br>");
    print("Cilindraje: ".$Cilindraje."<br>");
    print("Combustible: ".$Combustible."<br>");
    print("Origen: ".$Origen."<br>");
  print("</div>");

  
  

}//fin if post
?>
</body>
</html>

