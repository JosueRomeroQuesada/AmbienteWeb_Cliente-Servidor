<?php
session_start();
include 'ConnDB.php';

$conexion = ConnectDB();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['producto_id']) && isset($_POST['cantidad'])) {
        $productoId = $_POST['producto_id'];
        $cantidad = $_POST['cantidad'];

        $sql = "SELECT idProducto, descripcion, Precio, imagen FROM producto WHERE idProducto = $productoId";
        $resultado = mysqli_query($conexion, $sql);
        $producto = mysqli_fetch_assoc($resultado);

        if ($producto) {
            if (!isset($_SESSION['carrito'])) {
                $_SESSION['carrito'] = array();
            }

            $productoEnCarrito = false;
            foreach ($_SESSION['carrito'] as &$item) {
                if ($item['idProducto'] == $productoId) {
                    $item['cantidad'] += $cantidad;
                    $productoEnCarrito = true;
                    break;
                }
            }

            if (!$productoEnCarrito) {
                $_SESSION['carrito'][] = array(
                    'idProducto' => $producto['idProducto'],
                    'nombre' => $producto['descripcion'], 
                    'precio' => $producto['Precio'],
                    'imagen' => $producto['imagen'],
                    'descripcion' => $producto['descripcion'],
                    'cantidad' => $cantidad
                );
            }

            header('Location: carrito.php');
        } else {
            echo "Producto no encontrado.";
        }
    }
}

Desconecta($conexion);
?>
