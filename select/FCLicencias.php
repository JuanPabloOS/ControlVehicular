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
<h1>Licencias</h1>
<form action="#" method="POST">
   <label for="atributo">Selecciona el atributo</label>
    <select name="atributo" id="atributo">
        <option value="idLicencia">idLicencia</option>
        <option value="conductor">conductor</option>
        <option value="expedicion">Expedición</option>
        <option value="Tipo">Tipo</option>
        <option value="Vencimiento">Vencimiento</option>
        <option value="Lugar">Lugar</option>
        <option value="Expide">Expide</option>
        
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
		$SQL="SELECT * FROM Licencias WHERE ".$atributo." LIKE'".$valor."';";           
		$Query=EjecutarConsulta($Con,$SQL);        		
		print("<table>");
		print("<tr>");
?>
		<th>idLicencia</th>
		<th>Conductor</th>		
		<th>Expedicion</th>
		<th>Tipo</th>
		<th>Vencimiento</th>
		<th>Lugar</th>
		<th>Expide</th>			
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