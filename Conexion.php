<?php
   
        //Crear una función para conectar a la base de datos
    
    function Conectar(){

        $filename ='C:\xampp\htdocs\ControlVehicular\configuracion.ini';
        $manejador = fopen($filename,"r");
        $variables=array();
        while(!feof($manejador)){
            $linea = trim(fgets($manejador));    
            if(substr($linea,0,1) !="" and substr($linea,0,1) != "[" and substr($linea,0,1) != ";"){        
                $valores = explode("=",$linea);  
                $key=$valores[0]; 
                $value = substr($valores[1],1,-1);            
            $variables[$key]=$value;
            }        
        }        
        fclose($manejador);
        //$variables = iniparse('C:\xampp\htdocs\ControlVehicular\configuracion.ini');                
        //Declarar los parámetros        
        $ServerName =$variables['Server']; 
        $User=$variables['UserName'];
        $Password=$variables['Password'];
        $Bd=$variables['DataBase'];
        $Con=mysqli_connect($ServerName,$User,$Password,$Bd);
        //regresar la conexión en el return

        return $Con;
    }
    
    //Crear función para ejecutar una consulta    
    function EjecutarConsulta($Con,$SQL){        
    	$Query=mysqli_query($Con,$SQL);        
    	return $Query; 
    }

    //cerrar la conexión    
    function Desconectar($Con){
    	mysqli_close($Con);
    }
?>

