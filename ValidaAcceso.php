<?php    
session_start();
$username = $_POST["username"];
$pass =$_POST["password"];    

    include("Conexion.php");
    $Con = Conectar();
    $SQL = "SELECT * FROM Usuarios WHERE username = '$username';";
    $Query = EjecutarConsulta($Con,$SQL);
    
    if (mysqli_num_rows($Query) == 1){        
        $result = mysqli_fetch_assoc($Query);        
        if($result["Psw"] == $pass){
            if($result["Estado"]==1){
                if($result["Intento"]>2){
                $SQL = "UPDATE Usuarios SET intento=0 WHERE username='$username';";
                EjecutarConsulta($Con,$SQL);
                }
                print("<br>Bienvenido");
                //asignar valores a la variable global   
                $_SESSION['username'] =$username;
                $_SESSION['validacion']=True;
                $_SESSION['tiempo']=time();
                header("Location:MenuPrincipal.php");
            }else{
                print("<br> Tu usuario ha sido bloqueado");
                header("Location:error.html");
            }
            
            
        }else{            
            if($result["Intento"]>2){
                $SQL = "UPDATE Usuarios SET estado = 0 WHERE username = '$username';";
                EjecutarConsulta($Con,$SQL);
            }else{
                $SQL = "UPDATE Usuarios SET intento = intento+1 WHERE username = '$username';";
                EjecutarConsulta($Con,$SQL);
            }
            print("<br> error en los datos");
            header("Location:error.html");
        }                           
    }else{
        print("No existe ese usuario");
        header("Location:error.html");
    }
    Desconectar($Con);
?>