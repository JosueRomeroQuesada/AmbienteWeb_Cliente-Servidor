<?php
include 'ConnDB.php';  // Asegúrate de que esta ruta es correcta

$conn = ConnectDB();  // Llama a la función para obtener la conexión a la base de datos

$q = $_GET['q'];

// Usar consultas preparadas para prevenir inyecciones SQL
$query = $conn->prepare("
    SELECT producto.idProducto, producto.descripcion AS descripcionProducto, categoria.descripcion AS descripcionCategoria 
    FROM producto 
    JOIN categoria ON producto.idCategoria = categoria.idCategoria
    WHERE producto.descripcion LIKE ?
");
$q = "%$q%";
$query->bind_param("s", $q);
$query->execute();
$result = $query->get_result();

while ($row = $result->fetch_assoc()) {
    $url = '';
    switch ($row['descripcionCategoria']) {
        case 'Aceites':
            $url = 'Aceites.php';
            break;
        case 'Componentes':
            $url = 'Componentes.php';
            break;
        case 'Servicios':
            $url = 'Servicios.php';
            break;
        case 'Accesorios':
            $url = 'Accesorios.php';
            break;
        }
        echo "<p class='search-result'><a href='{$url}?id=" . $row['idProducto'] . "'>" . $row['descripcionProducto'] . "</a></p>";
    }

Desconecta2($conn);  // Cierra la conexión a la base de datos
?>
