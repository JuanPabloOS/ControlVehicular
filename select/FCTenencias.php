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
<h1>Tenencias</h1>
<form action="#" method="POST">
   <label for="atributo">Selecciona el atributo</label>
    <select name="atributo" id="atributo">
        <option value="Folio">Folio</option>
        <option value="Vehiculo">Vehiculo</option>
        <option value="Annio">Annio</option>
        <option value="Monto">Monto</option>
    </select>
    <br>
	<label for="valor">valor</label>
	<input type="text" name="valor" id="valor" maxlength="18">
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
		$SQL="SELECT * FROM Tenencias WHERE ".$atributo." LIKE'".$valor."';";           
		$Query=EjecutarConsulta($Con,$SQL);        		
		print("<table>");
		print("<tr>");
?>

		<th>Folio</th>
		<th>Vehículo</th>
		<th>Año</th>
		<th>Dirección</th>
		
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