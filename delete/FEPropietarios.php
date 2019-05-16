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
        <label for="RFC">RFC</label>
        <input type="text" id="RFC" name="RFC" maxlength="13">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>

<?php 

    if(isset($_POST['RFC'])){
        $RFC = $_POST['RFC'];        
        include($_SERVER['DOCUMENT_ROOT']."/ControlVehicular/Conexion.php");
        $Con=Conectar();
        $SQL="DELETE FROM Propietarios WHERE RFC='".$RFC."';";
        $Query=EjecutarConsulta($Con,$SQL);

        
        if($Query==TRUE)    {
            $lineas=mysqli_affected_rows($Con);
            print($lineas." registro completado");
        }else{
            // $error=mysqli_error($Con);
            // print($error);
            print("No se puede eliminar a esta persona");
            print("0 cambios realizados");
        }
        Desconectar($Con);
    }
?>