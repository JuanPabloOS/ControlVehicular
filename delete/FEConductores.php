<?php include('../manejoSesiones.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("../CargarEstilos2.php");?>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php include($_SERVER['DOCUMENT_ROOT']."/ControlVehicular/menubar.php"); ?>
    <form action="#" method="POST">
       <label for="CURP">Curp:</label>
        <input type="text" id='CURP' name = 'CURP' maxlength="18" placeholder=" CURP">
        <input type="submit" value="Enviar">
    </form>
    
</body>
</html>


<?php 
include($_SERVER['DOCUMENT_ROOT']."/ControlVehicular/Conexion.php");

    if(isset($_POST['CURP'])){
        $CURP = $_POST['CURP'];        
        
        $Con=Conectar();
        $SQL="DELETE FROM conductores WHERE CURP='$CURP';";
        $entry=EjecutarConsulta($Con,$SQL);

        if($entry==TRUE)    {
            $lineas=mysqli_affected_rows($Con);
            print($lineas." conductores dados de baja");
        }else{
            print("0 cambios realizados");
        }
        Desconectar($Con);
    }
?>