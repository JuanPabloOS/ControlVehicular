<?php 
session_start();
// if($_SESSION['validacion']){        
//         header("refresh:600;url=http://localhost:9999/ControlVehicular/logout.php");
//     }else{    
//         header("Location:FAcceso.html");
//     }
if(isset($_SESSION['validacion'])){

	if (!isset($_SESSION['tiempo'])) {
	    $_SESSION['tiempo']=time();
	}
	else if (time() - $_SESSION['tiempo'] > 600 ) {
	    session_destroy();
	    /* Aquí redireccionas a la url especifica */
	    header("Location: http://localhost:9999/ControlVehicular/logout.php");
	    die();  
	}
	$_SESSION['tiempo']=time(); //Si hay actividad seteamos el valor al tiempo actual
}else{
	header("Location: http://localhost:9999/ControlVehicular/logout.php");
}

?>