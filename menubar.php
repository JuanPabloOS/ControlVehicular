<div class="wrap">

<nav>
  <ul class="primary">
    
    <li>
      <a href="">VEHÍCULOS</a>
      <ul class="sub">
        <li><a href="http://localhost:9999/ControlVehicular/create/FVehiculos.php">ALTA</a></li>
        <li><a href="http://localhost:9999/ControlVehicular/delete/FEVehiculos.php">BAJA</a></li>
        
        <li><a href="http://localhost:9999/ControlVehicular/update/FUVehiculos.php">MODIFICACION</a></li>
        <!-- <li><a href="http://localhost:9999/ControlVehicular/create/PConductores.php">CONDUCTOR</a></li>
        <li><a href="http://localhost:9999/ControlVehicular/create/PLicencias.php">LICENCIA</a></li>
        <li><a href="http://localhost:9999/ControlVehicular/create/PMultas.php">MULTA</a></li>
        <li><a href="http://localhost:9999/ControlVehicular/create/PPropietarios.php">PROPIETARIO</a></li>
        <li><a href="http://localhost:9999/ControlVehicular/create/PTenencias.php">TENENCIAS</a></li>
        <li><a href="http://localhost:9999/ControlVehicular/create/PVehiculos.php">VEHICULOS</a></li>
        <li><a href="http://localhost:9999/ControlVehicular/create/PVerificaciones.php">VERIFICACIONES</a></li>
 -->
      </ul>
    </li>
    <li>
      <a href="">CONDUCTORES</a>
      <ul class="sub">
        <li><a href="http://localhost:9999/ControlVehicular/create/FConductores.php">ALTA</a></li>
        <li><a href="http://localhost:9999/ControlVehicular/delete/FEConductores.php">BAJA</a></li>
        <li><a href="http://localhost:9999/ControlVehicular/update/FUConductores.php">MODIFICACIÓN</a></li>
      </ul>
    </li>
    <li>
      <a href="">PROPIETARIOS</a>
      <ul class="sub">
        <li><a href="http://localhost:9999/ControlVehicular/create/FPropietarios.php">ALTA</a></li>
        <li><a href="http://localhost:9999/ControlVehicular/delete/FEPropietarios.php">BAJA</a></li>
        <li><a href="http://localhost:9999/ControlVehicular/update/FUPropietarios.php">MODIFICACIÓN</a></li>
      <!-- <li><a href="http://localhost:9999/ControlVehicular/delete/FEConductores.php">CONDUCTORES</a></li>                
        <li><a href="http://localhost:9999/ControlVehicular/delete/FELicencias.php">LICENCIAS</a></li>
        <li><a href="http://localhost:9999/ControlVehicular/delete/FEMultas.php">MULTAS</a></li>
        <li><a href="http://localhost:9999/ControlVehicular/delete/FEPropietarios.php">PROPIETARIOS</a></li>
        <li><a href="http://localhost:9999/ControlVehicular/delete/FETenencias.php">TENENCIAS</a></li>
        <li><a href="http://localhost:9999/ControlVehicular/delete/FEVehiculos.php">VEHICULOS</a></li>
        <li><a href="http://localhost:9999/ControlVehicular/delete/FEVerificaciones.php">VERIFICACIONES</a></li> -->
      </ul>  
    </li>
    <li>
      <a href="">EXPEDIR</a>
      <ul class="sub">
        <li><a href="http://localhost:9999/ControlVehicular/create/FLicencias.php">LICENCIA</a></li>
        <li><a href="http://localhost:9999/ControlVehicular/create/FMultas.php">MULTA</a></li>
        <li><a href="http://localhost:9999/ControlVehicular/create/FVerificaciones.php">VERIFICACIÓN VEHICULAR</a></li>
      </ul>  
    </li>
    <li>
      <a href="">REPORTES</a>
      <ul class="sub">
        <li><a href="http://localhost:9999/ControlVehicular/select/FCConductores.php">CONDUCTORES</a></li>                
        <li><a href="http://localhost:9999/ControlVehicular/select/FCLicencias.php">LICENCIAS</a></li>
        <li><a href="http://localhost:9999/ControlVehicular/select/FCMultas.php">MULTAS</a></li>
        <li><a href="http://localhost:9999/ControlVehicular/select/FCPropietarios.php">PROPIETARIOS</a></li>
        <li><a href="http://localhost:9999/ControlVehicular/select/FCTenencias.php">TENENCIAS</a></li>
        <li><a href="http://localhost:9999/ControlVehicular/select/FCVehiculos.php">VEHICULOS</a></li>
        <li><a href="http://localhost:9999/ControlVehicular/select/FCVerificaciones.php">VERIFICACIONES</a></li>
      </ul>  
    </li>
    <li>
      <a href="">USUARIO</a>
      <ul class="sub">
        <li>Usuario: <?php print($_SESSION['username'])?></li>
        <li><a href="http://localhost:9999/ControlVehicular/logout.php">Cerrar Sesión</a></li>
        
      </ul>  
    </li>
  </ul>
</nav>
</div>