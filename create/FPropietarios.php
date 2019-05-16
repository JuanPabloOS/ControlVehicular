<?php include('../manejoSesiones.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset= "utf8">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php include("../CargarEstilos2.php");?>
<title>Vehiculos</title>
</head>

<body>
<?php include($_SERVER['DOCUMENT_ROOT']."/ControlVehicular/menubar.php"); ?>

<form id="form1" name="form1" method="post" action="PPropietarios.php">
  <p class="titulo">Alta Propietarios</p>
  <p>&nbsp;</p>
  <p>
    <label>RFC
    <input type="text" name="RFC" maxlength="13" minlength="13"required/>
    </label>
  </p>
  <p>
    <label>CURP
    <input type="text" name="CURP" maxlength="18" minlength="18" required/>
    </label>
  </p>
  <p>
    <label>Nombre
    <input type="text" name="Nombre" maxlength="100" required />
    </label>
  </p>
  <p>
    <label>Direccion
    <input type="text" name="Direccion" maxlength="100" required />
    </label>
  </p>
  <p>
    <label>
    <input type="submit" name="Submit" value="Submit" />
    </label>
</p>
</form>
</body>
</html>
