<?php include('../manejoSesiones.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include("../CargarEstilos2.php");?>
    <title>Document</title>
</head>
<body>
<?php include($_SERVER['DOCUMENT_ROOT']."/ControlVehicular/menubar.php"); ?>
    <form action="#" method="POST">
        <p class="titulo">Baja Vehiculos</p>
        <label for="idVehiculo">idVehiculo</label>
        <input type="number" required id="idVehiculo" name="idVehiculo">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>

<?php 

    if(isset($_POST['idVehiculo'])){
        $idVehiculo = $_POST['idVehiculo'];        
        include($_SERVER['DOCUMENT_ROOT']."/ControlVehicular/Conexion.php");
        $Con=Conectar();
        $SQL="DELETE FROM vehiculos WHERE idVehiculo='$idVehiculo';";
        $entry=EjecutarConsulta($Con,$SQL);

        if($entry==TRUE)    {
            $lineas=mysqli_affected_rows($Con);
            print("EL VEHICULO HA SIDO DADO DE BAJA");
        }else{
            print("0 cambios realizados");
        }
        Desconectar($Con);
    }
?>