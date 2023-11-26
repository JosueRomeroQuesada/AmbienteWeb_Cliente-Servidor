<?php
require_once "conexion.php";
// Incluye el archivo de conexión a la base de datos
require_once "include/functions/recoge.php";

function  agregarProducto($pdescripcion, $pidMarca , $pcantidad,$pprecio, $pidCategoria,$pimagen,$pinformacion,$pactivo ) {
    $retorno = false;
    try
    {
    $oConexion = Conecta();
    if(mysqli_set_charset($oConexion, "utf8")){
        $stmt = $oConexion->prepare("INSERT INTO producto (descripcion, idMarca, Cantidad, Precio, idCategoria, imagen, informacion, activo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("siidissi", $descripcion, $idMarca, $cantidad, $precio, $idCategoria, $imagen, $informacion, $activo);
       
        $descripcion = $pdescripcion;
        $idMarca = $pidMarca;
        $cantidad =  $pcantidad;
        $precio = $pprecio;
        $idCategoria =  $pidCategoria;
        $imagen = $pimagen;
        $informacion = $pinformacion;
        $activo =$pactivo;
        if($stmt->execute()){
            $retorno = true;
            header("Location: Productos_admin.php");
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


require_once "conexion.php";
require_once "include/functions/recoge.php";

function eliminarProducto($idProducto) {
    $retorno = false;
    
    try {
        $oConexion = Conecta();

        $stmt = $oConexion->prepare("DELETE FROM producto WHERE idProducto = ?");
        $stmt->bind_param("i", $idProducto);

        $idProducto = $idProducto;

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


require_once "conexion.php";
require_once "include/functions/recoge.php";

function modificarProducto($idProducto, $pdescripcion, $pidMarca, $pcantidad, $pprecio, $pidCategoria, $pimagen, $pinformacion, $pactivo) {
    $retorno = false;

    try {
        $oConexion = Conecta();

        $stmt = $oConexion->prepare("UPDATE producto SET descripcion = ?, idMarca = ?, Cantidad = ?, Precio = ?, idCategoria = ?, imagen = ?, informacion = ?, activo = ? WHERE idProducto = ?");
        $stmt->bind_param("siidissii", $descripcion, $idMarca, $cantidad, $precio, $idCategoria, $imagen, $informacion, $activo, $idProducto);

        $descripcion = $pdescripcion;
        $idMarca = $pidMarca;
        $cantidad = $pcantidad;
        $precio = $pprecio;
        $idCategoria = $pidCategoria;
        $imagen = $pimagen;
        $informacion = $pinformacion;
        $activo = $pactivo;
        $idProducto = $idProducto;

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
