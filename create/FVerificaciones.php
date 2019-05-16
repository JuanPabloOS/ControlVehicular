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
<form id="form1" name="form1" method="post" action="PVerificaciones.php">
  <p class="titulo">Expedir Verificación Vehicular</p>
  <p>&nbsp;</p>
  <p>
    <label>Folio
    <input name="Folio" type="number" id="Folio"  class="inactive" disabled/>
    </label>
  </p>
  <p>
    <label>Vehiculo
    <input name="Vehiculo" type="number" id="Vehiculo"  required/>
    </label>
  </p>
  <p>
    <label>Fecha
    <input name="Fecha" type="date" id="Fecha" required/>
    </label>
  </p>
  <p>
    <label>Periodo
    <input name="Periodo" type="number" id="Periodo" min="1000" max="9999" required/>	
    </label>
  </p>
  <p>
    <label></label>
    <label>Dictamen
    <select name="Dictamen" id="Dictamen">
      <option>Verificado</option>
      <option>No verificado</option>
    </select>
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
