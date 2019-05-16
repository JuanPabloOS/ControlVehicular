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

<form id="form1" name="form1" method="post" action="PVehiculos.php">
  <p class="titulo">Alta Vehiculos</p>
  <p>&nbsp;</p>
  <p>
    <label>idVehiculo
    <input class="inactive" type="number" min="1000000000" max="9999999999" name="idVehiculo" disabled/>
    </label>
  </p>
  <p>
    <label>Propietario
    <input type="text" name="Propietario" maxlength="13" minlength="13" required/>
    </label>
  </p>
  <p>
    <label>Placa
    <input type="text" name="Placa" maxlength="8"/>
    </label>
  </p>
  <p>
    <label>Tipo    
    <select name="Tipo" id="">
      <option value="Sedan">Sedan</option>
      <option value="Camioneta">Camioneta</option>
      <option value="Vagoneta">Vagoneta</option>
      <option value="Furgoneta">Furgoneta</option>
      <option value="Autobus">Autobús</option>
      <option value="Camion">Camión</option>
      <option value="Motocicleta">Motocicleta</option>
    </select>
    </label>
  </p>
  <p>
    <label>Uso
    <select name="Uso" id="">
      <option value="Publico">Público</option>
      <option value="Privado">Privado</option>
    </select>

    </label>
  </p>
  <p>
    <label>Año
    <input type="number" name="Annio" min="1800" max="9999" required/>
    </label>
  </p>
  <p>
    <label>Color
    <input type="text" name="Color" maxlength="15" required/>
    </label>
  </p>
  <p>
    <label>Puertas
    <input type="number" name="Puertas" min="0" required/>
    </label>
  </p>
  <p>
    <label>Modelo
    <input type="text" name="Modelo" maxlength="10"/>
    </label>
  </p>
  <p>
    <label>Marca
    <input type="text" name="Marca" maxlength="15"/>
    </label>
  </p>
  <p>
    <label>Transmision
    
    <select name="Transmision" id="">
      <option value="Automatico">Automático</option>
      <option value="Estandar">Estándar</option>
    </select>
    </label>
  </p>
  <p>
    <label>capCarga
    <input type="number" min="0" max="999999" step="0.01" name="capCarga" />
    </label>
  </p>
  <p>
    <label>Serie
    <input type="text" name="Serie" maxlength="17"/>
    </label>
  </p>
  <p>
    <label>numMotor
    <input type="number" name="numMotor" max="999999999999999999" />
    </label>
  </p>
  <p>
    <label>Linea
    <input type="text" name="Linea" varchar="10"/>
    </label>
  </p>
  <p>
    <label>Sublinea
    <input type="text" name="Sublinea" varchar="20"/>
    </label>
  </p>
  <p>
    <label>Cilindraje
    <input type="number" name="Cilindraje" min="0" max="99"/>
    </label>
  </p>
  <p>
    <label>Combustible
    <select name="Combustible" id="">
      <option value="Gasolina">Gasolina</option>
      <option value="Diesel">Diesel</option>
      <option value="Electrico">Electrico</option>
      <option value="Gas natural">Gas natural</option>
      
    </select>
    </label>
  </p>
  <p>
    <label>Origen
    <input type="text" name="Origen" maxlength="20"/>
    </label>
  </p>
  <p>&nbsp;</p>
  <p>
    <label>
    <input type="submit" name="Submit" value="Submit" />
    </label>
  </p>
</form>
</body>
</html>
