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

<form id="form1" name="form1" method="post" action="PConductores.php">
  <p>Conductores</p>
  <p>&nbsp;</p>
  <p>
    <label>CURP
    <input type="text" name="CURP"  required maxlength="18" minlength="18"/>
    </label>
  </p>
  <p>
    <label>Nombre
    <input type="text" name="Nombre" maxlength="100" required />
    </label>
  </p>
  <p>
    <label>Domicilio
    <input type="text" name="Domicilio" required maxlength="100"/>
    </label>
  </p>
  <p>
    <label>Firma
    <input type="text" name="Firma" required/>
    </label>
  </p>
  <p>
    <label>Donador
    <select name="Donador">
      <option>Si</option>
      <option selected="selected">No</option>
    </select>
    </label>
  </p>
  <p>
    <label>Grupo Sanguíneo
    <select name="gpoSanguineo">
	   <option></option>
      <option>AB+</option>
      <option>AB-</option>
      <option>A+</option>
      <option>A-</option>
      <option>B+</option>
      <option>B-</option>
      <option>O+</option>
      <option>O-</option>

    </select>
    </label>
  </p>
  <p>
    <label>Restricción
    <input type="text" name="Restriccion" maxlength="50"/>
    </label>
  </p>
  <p>
    <label>telEmergencia
    <input type="text" name="telEmergencia" maxlength="25"/>
    </label>
  </p>
  <p>
    <label>fechaNacimiento
    <input type="date" name="fechaNacimiento" />
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
