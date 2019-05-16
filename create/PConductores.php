<?php include('../manejoSesiones.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset= "utf8">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php include("../CargarEstilos2.php");?>
<title>Conductores</title>
</head>

<body>
<?php include($_SERVER['DOCUMENT_ROOT']."/ControlVehicular/menubar.php"); 
?>
<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $CURP = $_POST["CURP"];
    $Nombre = $_POST["Nombre"];
    $Domicilio = $_POST["Domicilio"];
    $Firma = $_POST["Firma"];
    $Donador = $_POST["Donador"];

    $gpoSanguineo = '';
    $Restriccion = '';
    $telEmergencia = '';
    $fechaNacimiento = '';
    if ($_POST["gpoSanguineo"]!="") {    
        $gpoSanguineo = $_POST["gpoSanguineo"];
    }    //restricciones
    if ($_POST["Restriccion"] !="") {        
        $Restriccion = $_POST["Restriccion"];
    }
    //telefono de emergencia
    if ($_POST["telEmergencia"]!="") {        
        $telEmergencia = $_POST["telEmergencia"];
    }
    //Fechad e nacimiento
    if ($_POST["fechaNacimiento"]!="") {        
        $fechaNacimiento = $_POST["fechaNacimiento"];
    }

    include($_SERVER['DOCUMENT_ROOT']."/ControlVehicular/Conexion.php");
    $Con = Conectar();
    $SQL = "INSERT INTO Conductores VALUES('$CURP','$Nombre','$Domicilio','$Firma','$Donador','$gpoSanguineo','$Restriccion','$telEmergencia','$fechaNacimiento')";
    $entry=EjecutarConsulta($Con,$SQL);
    print("<div class='mensaje'>");
        if($entry==TRUE)    {
            $lineas=mysqli_affected_rows($Con);
            print("<span>".$lineas." REGISTRO COMPLETADO</span>");
            $conductores = new SimpleXMLElement('../Conductores.xml',null,true);
            $nuevoConductor=$conductores->addChild('conductor');
            $nuevoConductor->addChild('curp',$CURP);
            $nuevoConductor->addChild('nombre',$Nombre);
            $nuevoConductor->addChild('domicilio',$Domicilio);
            $nuevoConductor->addChild('firma',$Firma);
            $nuevoConductor->addChild('donador',$Donador);
            $nuevoConductor->addChild('gposanguineo',$gpoSanguineo);
            $nuevoConductor->addChild('restriccion',$Restriccion);
            $nuevoConductor->addChild('telemergencia',$telEmergencia);
            $nuevoConductor->addChild('fechanacimiento',$fechaNacimiento);
            $conductores->asXML('Conductores.xml');
        }else{
            print("<span>0 registros Completados</span>");
        }
        print("Datos ingresados:<br>");
        print("CURP: ".$CURP."<br>");
        print("Nombre: ".$Nombre."<br>");
        print("Domicilio: ".$Domicilio."<br>");
        print("Firma: ".$Firma."<br>");
        print("Donador: ".$Donador."<br>");
        print("Grupo Sanguíneo :".$_POST["gpoSanguineo"]."<br>");
        print("Restriccion :".$_POST["Restriccion"]."<br>");
        print("Teléfono de Emergencia :".$_POST["telEmergencia"]."<br>");
        print("Fecha de Nacimiento :".$_POST["fechaNacimiento"]."<br>");
        Desconectar($Con);
    print("</div>");
    }
?>

</body>
</html>
