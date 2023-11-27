<?php
require_once "conexion.php";
// Incluye el archivo de conexión a la base de datos
require_once "include/functions/recoge.php";

function  agregarCategoria($pdescripcion) {
    $retorno = false;
    try
    {
    $oConexion = Conecta();
    if(mysqli_set_charset($oConexion, "utf8")){
        $stmt = $oConexion->prepare("INSERT INTO categoria (descripcion) VALUES (?)");
        $stmt->bind_param("s", $descripcion);
       
        $descripcion = $pdescripcion;
        
        if($stmt->execute()){
            $retorno = true;
            header("Location: Categoria_admin.php");
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





function eliminarCategoria($idCategoria) {
    $retorno = false;
    
    try {
        $oConexion = Conecta();

        $stmt = $oConexion->prepare("DELETE FROM categoria WHERE idCategoria = ?");
        $stmt->bind_param("i", $idCategoria);

        $idCategoria = $idCategoria;

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



function modificarProducto($idCategoria, $pdescripcion) {
    $retorno = false;

    try {
        $oConexion = Conecta();

        $stmt = $oConexion->prepare("UPDATE categoria SET descripcion = ? WHERE idCategoria = ?");
        $stmt->bind_param("si", $descripcion, $idCategoria);

        $descripcion = $pdescripcion;
       
        $idCategoriao = $idCategoria;

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
