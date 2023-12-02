<?php
include 'templates/Header.php';
include 'ConnDB.php';
require('fpdf186/fpdf.php');


$totalCarrito = 0;

if (isset($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $item) {
        $totalCarrito += $item['precio'] * $item['cantidad'];
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['actualizar'])) {
        actualizarCantidad($_POST['productoId'], $_POST['cantidad']);
    }
    if (isset($_POST['TotalProductos'])) {
        facturaG($_POST['TotalProductos']);
    }
}

function eliminarDelCarrito($productoId)
{
    if (isset($_SESSION['carrito'])) {
        foreach ($_SESSION['carrito'] as $key => $item) {
            if ($item['idProducto'] == $productoId) {
                unset($_SESSION['carrito'][$key]);
                $_SESSION['carrito'] = array_values($_SESSION['carrito']);
                break;
            }
        }
    }
}

if (isset($_GET['eliminar'])) {
    eliminarDelCarrito($_GET['eliminar']);
}

function mostrarCarrito()
{
    if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
        foreach ($_SESSION['carrito'] as $item) {
            $imagen = $item['imagen'] ?? 'default.jpg';
            $descripcion = $item['descripcion'] ?? 'No disponible';
            $disponibilidad = $item['disponibilidad'] ?? 'No disponible';
            $precio = $item['precio'] ?? 0;
            $cantidad = $item['cantidad'] ?? 0;
            $idProducto = $item['idProducto'] ?? 0;

            echo "<tr>";
            echo "<td><img class='card-img-top custom-img-size' src='{$imagen}' alt='{$descripcion}' /></td>";
            echo "<td>{$descripcion}</td>";
            echo "<td>$ {$precio}</td>";
            echo "<td>";
            echo "<form action='carrito.php' method='post'>";
            echo "<input type='hidden' name='productoId' value='{$idProducto}' />";
            echo "<div class='input-number'>";
            echo "<input type='number' name='cantidad' value='{$cantidad}' min='1' />";
            echo "<button type='submit' name='actualizar'>Actualizar</button>"; 
            echo "</div>";
            echo "</form>";
            echo "</td>";
            echo "<td>$" . $precio * $cantidad . "</td>";
            echo "<td><a href='carrito.php?eliminar={$idProducto}'><i class='fa fa-trash'></i></a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>El carrito está vacío.</td></tr>";
    }
}

function calcularPrecioTotal($precio, $cantidad) {
    return $precio * $cantidad;
}

function calcularPrecioTotalCarrito($carrito) {
    $totalCarrito = 0;
    foreach ($carrito as $item) {
        $totalCarrito += $item['precioTotal']; 
    }
    return $totalCarrito;
}

function facturaG($totalCarrito)
{
    $archivoTexto = fopen('facturas/factura.txt', "w");
    fwrite($archivoTexto, "Factura de Compra\n");
    fwrite($archivoTexto, "-----------------\n");
    foreach ($_SESSION['carrito'] as $item) {
        $linea = $item['nombre'] . " - $" . $item['precio'] . " x " . $item['cantidad'] . "\n";
        fwrite($archivoTexto, $linea);
    }
    fwrite($archivoTexto, "-----------------\n");
    fwrite($archivoTexto, "Total: $" . $totalCarrito . "\n");
    fclose($archivoTexto);

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(40, 10, 'Factura de Compra', 0, 1);
    $pdf->Ln(10);

    foreach ($_SESSION['carrito'] as $item) {
        $linea = $item['nombre'] . " - $" . $item['precio'] . " x " . $item['cantidad'] . "\n";
        $pdf->Cell(0, 10, utf8_decode($linea), 0, 1);
    }

    $pdf->Ln(10);
    $pdf->Cell(0, 10, "Total: $" . $totalCarrito, 0, 1);

    $pdf->Output('facturas/factura.pdf', 'F'); 
}


function actualizarCantidad($productoId, $cantidad)
{
    if (isset($_SESSION['carrito'])) {
        foreach ($_SESSION['carrito'] as $key => &$item) {
            if ($item['idProducto'] == $productoId) {
                $item['cantidad'] = $cantidad; 
                $item['precioTotal'] = calcularPrecioTotal($item['precio'], $cantidad);
                break;
            }
        }
    }
}

facturaG($totalCarrito);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/carrito.js"></script>
</head>

<body>

    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Descripción</th>
                    <th>Precio unitario</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php mostrarCarrito(); ?>
            </tbody>
        </table>
        <div class="cart-summary">
            <div class="cart-total">
                <strong>Total Carrito:</strong> $
                <?php echo $totalCarrito; ?>
            </div>
            <form action="carrito.php" method="post">
                <input type="hidden" name="TotalProductos" value="<?php echo $totalCarrito; ?>">
                <button type="submit" class="primary-btn">Comprar y Generar Factura</button>
            </form>
        </div>
    </div>
</body>

</html>

<?php
include 'templates/Footer.php';
?>
