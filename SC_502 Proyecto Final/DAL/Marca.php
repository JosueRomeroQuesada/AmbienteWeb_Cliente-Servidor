<?php
require_once "conexion.php";
// Incluye el archivo de conexión a la base de datos
require_once "include/functions/recoge.php";


function  agregarMarca($pnombreMarca, $pdescripcion) {
    $retorno = false;
    try
    {
    $oConexion = Conecta();
    if(mysqli_set_charset($oConexion, "utf8")){
        $stmt = $oConexion->prepare("INSERT INTO marca (nombreMarca, descripcion) VALUES (?,?)");
        $stmt->bind_param("ss", $nombreMarca, $descripcion);
        $nombreMarca = $pnombreMarca;
        $descripcion = $pdescripcion;
        
        
        if($stmt->execute()){
            $retorno = true;
            header("Location: Marca_admin.php");
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




function eliminarMarca($idMarca) {
    $retorno = false;
    
    try {
        $oConexion = Conecta();

        $stmt = $oConexion->prepare("DELETE FROM marca WHERE idMarca = ?");
        $stmt->bind_param("i", $idMarca);

        $idMarca = $idMarca;

        if ($stmt->execute()) {
            $retorno = true;
        }
    } catch (\Throwable $th) {
        // Manejar la excepción o registrar en una bitácora según sea necesario
        echo $th;
    } finally {
        Desconecta($oConexion);
    }

    return $retorno;
}



function modificarMarca($idMarca, $pnombreMarca, $pdescripcion) {
    $retorno = false;

    try {
        $oConexion = Conecta();

        $stmt = $oConexion->prepare("UPDATE marca SET nombreMarca = ?, descripcion = ? WHERE idMarca = ?");
        $stmt->bind_param("ssi",$nombreMarca, $descripcion, $idMarca);

        $nombreMarca = $pnombreMarca;
         $descripcion = $pdescripcion;
       
        $idMarca = $idMarca;

        if ($stmt->execute()) {
            $retorno = true;
        }
    } catch (\Throwable $th) {
        // Manejar la excepción o registrar en una bitácora según sea necesario
        echo $th;
    } finally {
        Desconecta($oConexion);
    }

    return $retorno;
}



?>
