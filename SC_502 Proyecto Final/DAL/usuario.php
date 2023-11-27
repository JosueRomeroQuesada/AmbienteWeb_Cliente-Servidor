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

                        if($idRol != 1)
                        {
                        session_start();
                        $_SESSION['admin'] = $correo;
                        $_SESSION['idUsuario'] = $idUsuario;
                        $_SESSION['login'] = true;

                        $retorno = true;

                        }else{
                        session_start();
                        $_SESSION['usuario'] = $correo;
                        $_SESSION['idUsuario'] = $idUsuario;
                        $_SESSION['login'] = true;
                        }
                        
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

// Función para recuperar contraseña
function recuperarContrasena2($correo) {
    $retorno = false;
 
    try {
        $oConexion = Conecta();
 
        // formato utf8
        if (mysqli_set_charset($oConexion, "utf8")) {
            $query = "SELECT idUsuario, nombre, correo FROM usuario WHERE correo = ?";
            $stmt = $oConexion->prepare($query);
            $stmt->bind_param("s", $correo);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($idUsuario, $nombre, $correo);
 
            if ($stmt->fetch()) {
                // Generar una nueva contraseña aleatoria
                $nuevaContrasena = generarContrasenaAleatoria();
 
                // Actualizar la contraseña en la base de datos
                $hashedPassword = password_hash($nuevaContrasena, PASSWORD_DEFAULT);
                $updateQuery = "UPDATE usuario SET contrasenna = ? WHERE correo = ?";
                $updateStmt = $oConexion->prepare($updateQuery);
                $updateStmt->bind_param("ss", $hashedPassword, $correo);
                $updateStmt->execute();
 
                // Enviar la nueva contraseña por correo electrónico
                enviarCorreo($correo, $nuevaContrasena);
 
                $retorno = true;
            } else {
                // El usuario con el correo proporcionado no existe
                $retorno = false;
            }
        }
    } catch (\Throwable $th) {
        // Bitácora
        echo $th;
    } finally {
        Desconecta($oConexion);
    }
 
    return $retorno;
}


function generarContrasenaAleatoria($longitud = 8) {
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $contrasena = '';
    for ($i = 0; $i < $longitud; $i++) {
        $contrasena .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }
    return $contrasena;
}





// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// Incluye la clase PHPMailer y las excepciones de PHPMailer
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


function enviarCorreo($destinatario, $asunto, $mensaje) {
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.outlook.com'; 
        $mail->SMTPAuth   = true;
        $mail->Username   = 'lubricentro2023@outloook.com'; 
        $mail->Password   = 'Lubric3ntro'; 
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Configuración del remitente y destinatario
        $mail->setFrom('username', 'LubriCentro');
        $mail->addAddress($destinatario);

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = $asunto;
        $mail->Body    = $mensaje;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

function recuperarContrasena($correo) {
    // Lógica para recuperar la contraseña

    // Generar nueva contraseña
    $nuevaContrasena = generarNuevaContrasena();

    // Actualizar en la base de datos
    if (actualizarContrasenaEnBaseDeDatos($correo, $nuevaContrasena)) {

        // Enviar la nueva contraseña por correo electrónico
        $asunto = "Recuperación de Contraseña";
        $mensaje = "Tu nueva contraseña es: $nuevaContrasena";

        // Enviar correo electrónico
        if (enviarCorreo($correo, $asunto, $mensaje)) {
            return true; // Éxito
        } else {
            return false; // Error al enviar el correo
        }
    } else {
        return false; // Error al actualizar la contraseña en la base de datos
    }
}

function generarNuevaContrasena($longitud = 10) {
    // Genera una nueva contraseña aleatoria de longitud especificada
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $nuevaContrasena = '';
    
    for ($i = 0; $i < $longitud; $i++) {
        $nuevaContrasena .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }
    
    return $nuevaContrasena;
}

function actualizarContrasenaEnBaseDeDatos($correo, $nuevaContrasena) {
    // Lógica para actualizar la contraseña en la base de datos
    // Debes implementar esta función según la estructura de tu base de datos

    // Ejemplo usando MySQLi
    $conexion = new mysqli("localhost", "root", "", "lubricentro");

    // Verifica la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Actualiza la contraseña en la base de datos
    $consulta = $conexion->prepare("UPDATE usuario SET contrasenna = ? WHERE correo = ?");
    $consulta->bind_param("ss", $nuevaContrasena, $correo);

    $resultado = $consulta->execute();

    // Cierra la conexión y la consulta
    $consulta->close();
    $conexion->close();

    return $resultado;
}