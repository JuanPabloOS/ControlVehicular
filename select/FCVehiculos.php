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
<h1>Vehículos</h1>
<form action="#" method="POST">
   <label for="atributo">Selecciona el atributo</label>
    <select name="atributo" id="atributo">
        <option value="idVehiculo">idVehiculo</option>
        <option value="Propietario">Propietario</option>
        <option value="Placa">Placa</option>
        <option value="Tipo">Tipo</option>
        <option value="Uso">Uso</option>
        <option value="Annio">Annio</option>
        <option value="Color">Color</option>
        <option value="Puertas">Puertas</option>
        <option value="Modelo">Modelo</option>
        <option value="Marca">Marca</option>
        <option value="Transmision">Transmision</option>
        <option value="capCarga">capCarga</option>
        <option value="Serie">Serie</option>
        <option value="numMotor">numMotor</option>
        <option value="Linea">Linea</option>
        <option value="Sublinea">Sublinea</option>
        <option value="Cilindraje">Cilindraje</option>
        <option value="Combustible">Combustible</option>
        <option value="Origen">Origen</option>
        
    </select>
    <br>
	<label for="valor">valor</label>
	<input type="text" name="valor" id="valor" maxlength="20">
	<br>
	<input type="submit" value="Buscar">
</form>
 
 
<?php
	if(isset($_POST['atributo'])){
        
		$atributo=$_POST['atributo'];
        if($_POST['valor'] != ''){
           $valor=$_POST['valor']; 
        }else{
            $valor='';
        }
            /*$valor = strtoupper($valor);*/
		include($_SERVER['DOCUMENT_ROOT']."/ControlVehicular/Conexion.php");
		$Con=Conectar();           
		$SQL="SELECT * FROM Vehiculos WHERE ".$atributo." LIKE'".$valor."';";           
		$Query=EjecutarConsulta($Con,$SQL);        		
		print("<table>");
		print("<tr>");
?>

		<th>ID</th>
		<th>Propietario</th>
		<th>Placa</th>
		<th>Tipo</th>
		<th>Uso</th>
		<th>Annio</th>
		<th>Color</th>
		<th>Puertas</th>
		<th>Modelo</th>
		<th>Marca</th>
		<th>Transmisión</th>
		<th>capCarga</th>
		<th>Serie</th>
		<th>numMotor</th>
		<th>Linea</th>
		<th>Sublinea</th>
		<th>Cilindraje</th>
		<th>Combustible</th>
		<th>Origen</th>
<?php
		print("</tr>");        
		for ($i=0; $i < mysqli_num_rows($Query); $i++) { 
            print("<tr>");
			$fila=mysqli_fetch_row($Query);			
			foreach ($fila as $key => $a) {	
				print("<th>".$a."</th>");
			}
            print("</tr>");
		}
		print("</table>");
		print("Registros ecncontrados: ".mysqli_num_rows($Query));
		Desconectar($Con);
	}	

	
?>

</body>
</html>