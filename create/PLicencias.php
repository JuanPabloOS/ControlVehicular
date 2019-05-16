<?php include('../manejoSesiones.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset= "utf8">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php include("../CargarEstilos2.php");?>
<title>Licencias</title>
</head>

<body>
<?php include($_SERVER['DOCUMENT_ROOT']."/ControlVehicular/menubar.php"); ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


  $Expedicion = date('Y-m-d'); // 2016-12-29
  if($_POST['Vigencia']==3){
    $Vencimiento = strtotime ('+3 year' , strtotime($Expedicion)); //Se añade un año mas  
  }else{
    $Vencimiento = strtotime ('+5 year' , strtotime($Expedicion)); //Se añade un año mas  
  }
  
  $Vencimiento = date ('Y-m-d',$Vencimiento);
	$Conductor = $_POST["Conductor"];	
	$Tipo = $_POST["Tipo"];	
	$Lugar = $_POST["Lugar"];
	$Expide = $_POST["Expide"];

  	include($_SERVER['DOCUMENT_ROOT']."/ControlVehicular/Conexion.php");
  	$Con = Conectar();
  	$SQL = "INSERT INTO Licencias (idLicencia,conductor,expedicion,tipo,vencimiento,lugar,expide)
  	VALUES ('','$Conductor','$Expedicion','$Tipo','$Vencimiento','$Lugar','$Expide')";
  	$entry=EjecutarConsulta($Con,$SQL);
    //id generado
    $id =mysqli_insert_id($Con);

// imprimir contenido 
    print("<div class='mensaje'>");
  		if($entry==TRUE)	{
  			$lineas=mysqli_affected_rows($Con);
  			print("<span>".$lineas." Registro completado</span><br>");
        print("<a target='_blank' href='http://localhost:9999/ControlVehicular/pdf/pdfLicencia.php?id=".$id."'>Imprimir pdf</a><br>");
        echo  "<script>window.open('http://localhost:9999/ControlVehicular/pdf/pdfLicencia.php?id=".$id."', '_blank')</script>";
  		}else{
  			print("<span>Registro no completado</span><br>");
  		}
    Desconectar($Con);
        
        if(isset( $_POST["idLicencia"])){
            print("idLicencia: ".$_POST["idLicencia"]."<br>");
          }
        print("Conductor: ".$Conductor."<br>");
        print("Expedicion: ".$Expedicion."<br>");
        print("Tipo: ".$Tipo."<br>");
        print("Vencimiento: ".$Vencimiento."<br>");
        print("Lugar: ".$Lugar."<br>");
        print("Expide: ".$Expide."<br>");

    print("</div>");
        
   //respaldo en xml
}
?>

</body>
</html>
