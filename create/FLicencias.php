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

<form id="form1" name="form1" method="post" action="PLicencias.php">
  <p>Licencias</p>
  <p>
    <label>idLicencia
    <input class="inactive" type="number" name="idLicencia" min="1000000000" max="9999999999" disabled/>
    </label>
  </p>
  <p>
    <label> Conductor
    <input type="text" name="Conductor" minlength="18" maxlength="18" required/>
    </label>
  </p>
  <!-- <p>
    <label>Expedicion
    <input type="date" name="Expedicion" required/>
    </label>
  </p> -->
  <p>
    <label>Tipo
    <select name="Tipo" id="Tipo">
      <option value="A1">A1</option>
      <option value="A2">A2</option>
      <option value="A3">A3</option>
      <option value="A4">A4</option>
      <option value="A5">A5</option>
      <option value="B">B</option>
      <option value="C">C</option>
      <option value="D">D</option>
      <option value="E">E</option>
      <option value="F">F</option>
    </select>
    </label>
  </p>
  <p>
    <!-- <label>Vencimiento
    <input type="date" name="Vencimiento" required/>
    </label> -->
    <p>
      <label for="Vigencia">Vigencia
        <select name="Vigencia" id="Vigencia">
          <option value="3">3 años</option>
          <option value="5">5 años</option>
        </select>
      </label>
    </p>
  </p>

  <p>
    <label>Lugar
    <select name="Lugar" id="Lugar">
      <option value="Aguascalientes">Aguascalientes</option>
      <option value="Baja California">Baja California</option>
      <option value="Baja California Sur">Baja California Sur</option>
      <option value="Campeche">Campeche</option>
      <option value="Chiapas">Chiapas</option>
      <option value="Chihuahua">Chihuahua</option>
      <option value="Distrito Federal">Distrito Federal</option>
      <option value="Coahuila">Coahuila</option>
      <option value="Colima">Colima</option>
      <option value="Durango">Durango</option>
      <option value="Guanajuato">Guanajuato</option>
      <option value="Guerrero">Guerrero</option>
      <option value="Hidalgo">Hidalgo</option>
      <option value="Jalisco">Jalisco</option>
      <option value="México">México</option>
      <option value="Michoacán">Michoacán</option>
      <option value="Morelos">Morelos</option>
      <option value="Morelos">Morelos</option>
      <option value="Nuevo León">Nuevo León</option>
      <option value="Oaxaca">Oaxaca</option>
      <option value="Puebla">Puebla</option>
      <option value="Querétaro">Querétaro</option>
      <option value="Quintana Roo">Quintana Roo</option>
      <option value="San Luis Potosí">San Luis Potosí</option>
      <option value="Sinaloa">Sinaloa</option>
      <option value="Sonora">Sonora</option>
      <option value="Tabasco">Tabasco</option>
      <option value="Tamaulipas">Tamaulipas</option>
      <option value="Tlaxcala">Tlaxcala</option>
      <option value="Veracruz">Veracruz</option>
      <option value="Yucatán">Yucatán</option>
      <option value="Zacatecas">Zacatecas</option>
    </select>
    </label>
  </p>
  <p>
    <label>Expide
    <input type="text" name="Expide" maxlength="20" required/>
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
