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
<form id="form1" name="form1" method="post" action="PMultas.php">
  <p class="titulo">Expedir Multa</p>
  <p>&nbsp;</p>
  <p>

    <label>Folio
    <input type="number" class="inactive" step="any" name="Folio" disabled/>
    </label>
  </p>
  <p>
    <label>Licencia
    <input type="number" name="Licencia"/>
    </label>
  </p>
  <p>
    <label>Vehiculo
    <input type="number" name="Vehiculo"/>
    </label>
  </p>
  <p>
    <label>idOficial
    <input type="number" name="idOficial" required/>
    </label>
  </p>
  <p>
    <label>Monto
    <input type="number" name="Monto" step="0.01" max="99999" required/>
    </label>
  </p>
  <p>
    <label>Lugar
    <input type="text" name="Lugar" maxlength="100" required/>
    </label>
  </p>
  <p>
    <label>Hora
    <input type="time" name="Hora" required/>
    </label>
  </p>
  <p>
    <label>Fecha
    <input type="date" name="Fecha" required/>
    </label>
  </p>
  <p>
    <label>Motivo
    <input type="text" name="Motivo" maxlength="50" required />
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
