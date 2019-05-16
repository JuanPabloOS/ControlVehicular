<?php include('../manejoSesiones.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset= "utf8">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php include("../CargarEstilos2.php");?>
<title>Tenencias</title>
</head>

<body>
<?php include($_SERVER['DOCUMENT_ROOT']."/ControlVehicular/menubar.php"); ?>
<form id="form1" name="form1" method="post" action="PTenencias.php">
  <p>Tenencias</p>
  <p>
    <label></label>
  </p>
  <p>
    <label>Folio
    <input class="inactive" type="text" name="Folio" minlength="18"maxlength="18" disabled/>
    </label>
  </p>
  <p>
    <label>Vehiculo
    <input type="number" name="Vehiculo" required/>
    </label>
  </p>
  <p>
    <label>Año
    <input type="number" min="2000" max="9999" name="Annio" required/>
    </label>
  </p>
  <p>
    <label>Monto
    <input type="number" step=".01" max="9999" name="Monto" required/>
    </label>
</p>
  <p>
    <label>
    <input type="submit" name="Submit" value="Submit" />
    </label>
</p>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$Vehiculo = $_POST["Vehiculo"];
$Annio = $_POST["Annio"];
$Monto = $_POST["Monto"];
if(isset($_POST["Folio"])){
	print("Folio: ".$_POST["Folio"]."<br>");
}

print("Vehiculo: ".$Vehiculo."<br>");
print("Año: ".$Annio."<br>");

print("Monto: $".$Monto."<br>");

include($_SERVER['DOCUMENT_ROOT']."/ControlVehicular/Conexion.php");
$Con = Conectar();
$SQL = "INSERT INTO Tenencias (folio, vehiculo, annio, monto)
VALUES ('','$Vehiculo','$Annio','$Monto')";
$entry=EjecutarConsulta($Con,$SQL);

	if($entry==TRUE)	{
		$lineas=mysqli_affected_rows($Con);
		print($lineas." registro completado");
	}else{
		print("0 registros completados");
	}
Desconectar($Con);
}
?>
</body>
</html>
