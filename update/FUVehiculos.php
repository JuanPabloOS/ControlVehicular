<?php include('../manejoSesiones.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <?php include("../CargarEstilos2.php");?>
	<title></title>
</head>
<body>
<?php include($_SERVER['DOCUMENT_ROOT']."/ControlVehicular/menubar.php"); ?>
<form action="#" method="POST">
	<p class="titulo">Modificación Vehiculos</p>
	<label for="idVehiculo">Ingrese el id del vehículo</label>
	<input type="number" name="buscarId" name="buscarId" required>
	<input type="submit">
</form>

<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
include($_SERVER['DOCUMENT_ROOT']."/ControlVehicular/Conexion.php");
	if(isset($_POST['buscarId'])){
		
		$idVehiculo = $_POST['buscarId'];
		$Con = Conectar();
		$SQL = "SELECT * FROM  Vehiculos WHERE idVehiculo = '$idVehiculo';";
		$Query=EjecutarConsulta($Con,$SQL);
		$result=mysqli_fetch_assoc($Query);
		Desconectar($Con);
		if(mysqli_num_rows($Query)>0){


			?>		
			<form action="#" method="POST">
				<label for="guardado">Id Vehiculo <input class="inactive" type="number" id="guardado" name="Guardado" value=<?php echo $result['idVehiculo']; ?> ></label>
				<label for="propietario">Propietario:<input type="text" id="propietario" name="Propietario" value=<?php echo $result['Propietario'] ?>></label>			
				<label for="placa">Placa:<input type="text" name="Placa" id="placa" value=<?php echo $result['Placa']; ?>></label>			
				<label for="Uso">Uso: <input type="text" id="tipo" name="Uso" value=<?php echo $result['Uso']; ?>></label>

				<input type="submit" value="Actualizar">
			</form>		
			<?php
		}else{
				echo "<p>No hay ningún vehículo con ese id </p>";
		}
			 
	}else {
		if(isset($_POST['Propietario'])){
			
			$Con=Conectar();			
			$idVehiculo=$_POST['Guardado'];
			$Propietario=$_POST['Propietario'];
			$Placa=$_POST['Placa'];
			$Uso=$_POST['Uso'];
			
			$SQL="UPDATE Vehiculos set Propietario='$Propietario', Placa='$Placa', Uso='$Uso' WHERE idVehiculo = '$idVehiculo'";
			$update=EjecutarConsulta($Con,$SQL);
			if(!$update){
				echo "Houston tenemos un problema <br>";
			}else{
				echo "Datos actualizados correctamente<br>";
			}
			Desconectar($Con);
		}
	}
}
 ?>

</body>
</html>
