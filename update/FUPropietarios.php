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
	<p class="titulo">Modificación Propietarios</p>
	<label for="idVehiculo">Ingrese el RFC del propietario</label>
	<input type="text" maxlength="13" name="buscarId" name="buscarId" required>
	<input type="submit">
</form>

<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
include($_SERVER['DOCUMENT_ROOT']."/ControlVehicular/Conexion.php");
	if(isset($_POST['buscarId'])){
		
		$RFC = $_POST['buscarId'];
		$Con = Conectar();
		$SQL = "SELECT * FROM  Propietarios WHERE RFC = '$RFC';";
		$Query=EjecutarConsulta($Con,$SQL);
		$result=mysqli_fetch_assoc($Query);
		Desconectar($Con);
		if(mysqli_num_rows($Query)>0){

			?>		
			<form action="#" method="POST">
				
				<label for="guardado">RFC <input class="inactive" type="text" id="guardado" name="Guardado" value=<?php echo $result['RFC']; ?> ></label>

				<label for="Nombre">Nombre:<input type="text" maxlength="25" id="Nombre" name="Nombre" value=<?php echo $result['Nombre']; ?> ></label>			
				<label for="Direccion">Direccion:<input type="text" maxlength="25" name="Direccion" id="Direccion" value=<?php echo $result['Direccion']; ?>></label>			
				
				<input type="submit" value="Actualizar">
			</form>		
			<?php
		}else{
				echo "<p>No hay ningún conductor con ese RFC </p>";
		}
			 
	}else {
		if(isset($_POST['Nombre'])){ 
			
			$Con=Conectar();			
			$RFC=$_POST['Guardado'];
			$Nombre=$_POST['Nombre'];
			$Direccion=$_POST['Direccion'];					
			
			$SQL="UPDATE Propietarios set Nombre='".$Nombre."', Direccion='".$Direccion."' WHERE RFC = '".$RFC."';";
			
			$update=EjecutarConsulta($Con,$SQL);
			if(!$update){
				print(mysqli_error($Con));
				echo "<br>No se han podido actualizar los datos <br>";
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
