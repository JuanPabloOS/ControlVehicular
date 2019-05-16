<?php
print("leer parámetros");
function iniparse($filename){
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
    return $variables;
}
$misVariables = iniparse("../configuracion.ini");
//print(implode($misVariables));
?>