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
	<p class="titulo">Modificación Conductores</p>
	<label for="idVehiculo">Ingrese el CURP del conductor</label>
	<input type="text" maxlength="18" name="buscarId" name="buscarId" required>
	<input type="submit">
</form>

<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
include($_SERVER['DOCUMENT_ROOT']."/ControlVehicular/Conexion.php");
	if(isset($_POST['buscarId'])){
		
		$CURP = $_POST['buscarId'];
		$Con = Conectar();
		$SQL = "SELECT * FROM  Conductores WHERE CURP = '$CURP';";
		$Query=EjecutarConsulta($Con,$SQL);
		$result=mysqli_fetch_assoc($Query);
		Desconectar($Con);
		if(mysqli_num_rows($Query)>0){


			?>		
			<form action="#" method="POST">
				<?php print($result['domicilio']); ?>
				<label for="guardado">CURP <input class="inactive" type="text" id="guardado" name="Guardado" value=<?php echo $result['CURP']; ?> ></label>

				<label for="Domicilio">Domicilio:<input type="text" maxlength="25" id="Domicilio" name="Domicilio" value=<?php echo $result['domicilio']; ?> ></label>			
				<label for="telEmergencia">telEmergencia:<input type="text" maxlength="25" name="telEmergencia" id="telEmergencia" value=<?php echo $result['telEmergencia']; ?>></label>			
				
				<input type="submit" value="Actualizar">
			</form>		
			<?php
		}else{
				echo "<p>No hay ningún conductor con ese CURP </p>";
		}
			 
	}else {
		if(isset($_POST['Domicilio'])){ 
			
			$Con=Conectar();			
			$CURP=$_POST['Guardado'];
			$Domicilio=$_POST['Domicilio'];
			$telEmergencia=$_POST['telEmergencia'];					
			
			$SQL="UPDATE Conductores set Domicilio='".$Domicilio."', telEmergencia='".$telEmergencia."' WHERE CURP = '".$CURP."';";
			
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
