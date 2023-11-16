<?php

require_once "conexion.php";

function Registro($pNombre, $pCorreo, $pContrasena, $pApellido) {
    $retorno = false;

    try {
        $oConexion = Conecta();

        //formato utf8
        if(mysqli_set_charset($oConexion, "utf8")){
            $stmt = $oConexion->prepare("insert into usuario (nombre, correo, contrasenna,apellido,idRol) values ( ?, ?, ?, ?, 1)");
            $stmt->bind_param("ssss",$iNombre, $iCorreo, $iContrasena,$iApellido);

            //set parametros y luego ejecutarlo
            
            $iNombre = $pNombre;
            $iCorreo = $pCorreo;
            $iContrasena = $pContrasena;
            $iApellido = $pApellido;
            

            if($stmt->execute()){
                $retorno = true;
            }
        }
    } catch (\Throwable $th) {
        //Bitacora
        echo $th;
    } finally {
        Desconecta($oConexion);
    }

    return $retorno;
}
function Verificar($pcorreo, $pcontrasenna) {
    $errores = [];
    $retorno = false;

    if ($_SERVER['REQUEST_METHOD'] === 'POST')  {
        require_once "include/functions/recoge.php";
        
        try {
            $oConexion = Conecta();

            // formato utf8
            if (mysqli_set_charset($oConexion, "utf8")) {
                $query = "SELECT idUsuario, nombre, correo, contrasenna, apellido, idRol FROM usuario WHERE correo = ?";
                $stmt = $oConexion->prepare($query);
                $stmt->bind_param("s", $pcorreo);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($idUsuario, $nombre, $correo, $contrasenna, $apellido, $idRol);

                if ($stmt->fetch()) {
                    if (password_verify($pcontrasenna, $contrasenna)) {
                        
                        session_start();
                        $_SESSION['usuario'] = $correo;
                        $_SESSION['idUsuario'] = $idUsuario;
                        $_SESSION['login'] = true;
                        
                        
                    } else {
                        $errores[] = "La contraseña no es válida";
                    }
                } else {
                    $errores[] = "El usuario con el correo '$pcorreo' no existe";
                }
                if($stmt->execute()){
                    $retorno = true;
                }
            }
        } catch (\Throwable $th) {
            // Bitácora
            echo $th;
        } finally {
            Desconecta($oConexion);
        }
    }
    return $retorno;
}




function getArray($sql) {
    try {
        $oConexion = Conecta();

        //formato utf8
        if(mysqli_set_charset($oConexion, "utf8")){
            if(!$result = mysqli_query($oConexion, $sql)) die(); //cancelar el programa
            $retorno = array();
            while ($row = mysqli_fetch_array($result)) {
                $retorno[] = $row;
            }
        }
    } catch (\Throwable $th) {
        //Bitacora
        echo $th;
    } finally {
        Desconecta($oConexion);
    }
    return $retorno;
}

function getObject($sql) {
    try {
        $oConexion = Conecta();

        //formato utf8
        if(mysqli_set_charset($oConexion, "utf8")){
            if(!$result = mysqli_query($oConexion, $sql)) die(); //cancelar el programa
            $retorno = null;
            while ($row = mysqli_fetch_array($result)) {
                $retorno = $row;
            }
        }
    } catch (\Throwable $th) {
        //Bitacora
        echo $th;
    } finally {
        Desconecta($oConexion);
    }
    return $retorno;
}

