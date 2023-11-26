
<?php
include 'templates/Header.php';
include 'ConnDB.php';
?>

<?php

$conexion = ConnectDB();
// Consulta SQL para obtener los productos de la categoría "Aceites"
$sql = "SELECT * FROM marca ORDER BY idMarca;"; 
// Ejecuta la consulta
$resultado = mysqli_query($conexion, $sql);
?>


<?php

$conexion2 = ConnectDB();
// Consulta SQL para obtener los productos de la categoría "Aceites"
$sql2 = "SELECT * FROM categoria ORDER BY  idCategoria;"; 
// Ejecuta la consulta
$resultado2 = mysqli_query($conexion2, $sql2);
?>

<?php 
$oConexion = ConnectDB();
$id = $_GET['idProducto'];
$m = "SELECT * FROM producto WHERE idProducto = '$id'";
$modificar = ConnectDB() ->query($m);
$dato = $modificar ->fetch_array();


?>

<?php



// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Llama a la función para agregar el producto
    require_once "include/functions/recoge.php";
    


    $descripcion = recogePost("descripcion");
    $idMarca = recogePost("idMarca");
    $cantidad = recogePost("cantidad");
    $precio = recogePost("precio");
    $idCategoria = recogePost("idCategoria");
    $imagen = recogePost("imagen");
    $informacion = recogePost("informacion");
    $activo = recogePost("activo");

    require_once "DAL/productos.php";
    agregarProducto($descripcion, $idMarca , $cantidad,$precio, $idCategoria,$imagen,$informacion,$activo);

}

?>



<form  method="post">
<div class="form-group">
    <label for="descripcion">Descripción:</label>
    <input class="form-control" type="text" id="descripcion" name="descripcion" value ="<?php echo $dato['descripcion'] ?>" required>
   
    </div>
    <div class="form-group">
    <label for="idMarca">ID de Marca:</label>
    <select class="form-control"  id="idMarca" name="idMarca" value ="<?php echo $dato['idMarca'] ?>">
    <?php
         // Recorre los resultados de la consulta y muestra los productos
        while ($marca = mysqli_fetch_assoc($resultado)) {
    ?>
        <option value=<?php echo $marca['idMarca']; ?>><?php echo $marca['nombreMarca']; ?></option>
        
    <?php
            }
     ?>
     </select>


    </div>
    <div class="form-group">
    <label for="cantidad">Cantidad:</label>
    <input class="form-control" type="number" id="cantidad" name="cantidad" value ="<?php echo $dato['Cantidad'] ?>" required><br>
    </div>
    <div class="form-group">
    <label for="precio">Precio:</label>
    <input class="form-control" type="number" step="0.01" id="precio" name="precio" value ="<?php echo $dato['Precio'] ?>" required><br>

    </div>
    <div class="form-group">
    <label for="idCategoria">ID de Categoría:</label>
    <select class="form-control"  id="idCategoria" name="idCategoria" value ="<?php echo $dato['idCategoria'] ?>" required><br>
    <?php
         // Recorre los resultados de la consulta y muestra los productos
        while ($categoria = mysqli_fetch_assoc($resultado2)) {
    ?>
        <option value=<?php echo $categoria['idCategoria']; ?>><?php echo $categoria['descripcion']; ?></option>
        
    <?php
            }
     ?>
     </select>

    </div>
    <div class="form-group">
    <label for="imagen">URL de la Imagen:</label>
    <input class="form-control" type="text" id="imagen" name="imagen" value ="<?php echo $dato['imagen'] ?>" required><br>

    </div>
    <div class="form-group">
    <label for="informacion">Información:</label>
    <textarea  class="form-control" id="informacion" name="informacion" value ="<?php echo $dato['informacion'] ?>" required></textarea><br>

    </div>
    <div class="form-group">
    <label for="activo">Activo:</label>
    <select class="form-control"  id="activo" name="activo" value ="<?php echo $dato['activo'] ?>">
        <option value="1">Sí</option>
        <option value="0">No</option>
    </select><br>

    <button type="submit">Editar Producto</button>
</form>

</body>

</html>


<?php
include 'templates/Footer.php';
?>