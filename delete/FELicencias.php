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
        <label for="idLicencia">Id Licencia</label>
        <input type="text" id="idLicencia" name="idLicencia">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>

<?php 

    if(isset($_POST['idLicencia'])){
        $idLicencia = $_POST['idLicencia'];        
        include($_SERVER['DOCUMENT_ROOT']."/ControlVehicular/Conexion.php");
        $Con=Conectar();
        $SQL="DELETE FROM licencias WHERE idLicencia='$idLicencia';";
        $entry=EjecutarConsulta($Con,$SQL);

        if($entry==TRUE)    {
            $lineas=mysqli_affected_rows($Con);
            print($lineas." registro completado");
        }else{
            print("0 cambios realizados");
        }
        Desconectar($Con);
    }
?>