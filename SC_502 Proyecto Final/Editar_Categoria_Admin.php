
<?php
include 'templates/Header.php';
include 'ConnDB.php';
?>
<?php 
$oConexion = ConnectDB();
$id = $_GET['idCategoria'];
$m = "SELECT * FROM categoria WHERE idCategoria = '$id'";
$modificar = ConnectDB() ->query($m);
$dato = $modificar ->fetch_array();


?>
<?php



// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Llama a la función para agregar el producto
    require_once "include/functions/recoge.php";
    


    $descripcion = recogePost("descripcion");
    

    require_once "DAL/Categoria.php";
    modificarProducto($id, $descripcion);
    header("Location: Categoria_admin.php");

}

?>
<nav id="navigation">
    <div class="container">
        <div id="responsive-nav">
            <ul class="main-nav nav navbar-nav">
                <li><a href="Productos_admin.php">CRUD Productos</a></li>
                <li  class="active"><a  href="Categoria_admin.php">CRUD Categorias</a></li>
                <li><a href="*">CRUD Marcas</a></li>
                
            </ul>
        </div>
    </div>
</nav>
<form  method="post">
<div class="form-group">
    <label for="descripcion">Descripción:</label>
    <input class="form-control" type="text" id="descripcion" name="descripcion" value ="<?php echo $dato['descripcion'] ?>" required>

    <button type="submit">Editar Producto</button>
</form>
</body>
</html>


<?php
include 'templates/Footer.php';
?>