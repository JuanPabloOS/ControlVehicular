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
	<h1>Consultar Multa</h1>
   <label for="atributo">Selecciona el atributo</label>
    <select name="atributo" id="atributo">           <option value="Folio">Folio</option>     
    <option value="Licencia">Licencia</option>
    <option value="Vehiculo">Vehiculo</option>
    <option value="idOficial">idOficial</option>
    <option value="Monto">Monto</option>
    <option value="Lugar">Lugar</option>
    <option value="Hora">Hora</option>
    <option value="Fecha">Fecha</option>
    <option value="Motivo">Motivo</option>
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
		$SQL="SELECT * FROM Multas WHERE ".$atributo." LIKE'".$valor."';";           
		$Query=EjecutarConsulta($Con,$SQL);        		
		print("<table>");
		print("<tr>");
?>

		<th>Folio</th>
		<th>Licencia</th>
		<th>Vehiculo</th>
		<th>idOficial</th>
		<th>Monto</th>
		<th>Lugar</th>
		<th>Hora</th>
		<th>Fecha</th>
		<th>Motivo</th>
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