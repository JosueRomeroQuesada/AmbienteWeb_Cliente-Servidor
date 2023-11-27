<?php
/*
session_start();
$usuario = $_SESSION['admin'];
if(!isset($usuario))
{
header("location:index.php");
}*/
?>
<?php
include 'templates/Header.php';
include 'ConnDB.php';
require_once "DAL/Categoria.php";
?>

<?php
$conexion = ConnectDB();
// Consulta SQL para obtener los productos de la categoría 
$sql = "SELECT * FROM categoria ORDER BY idCategoria;";
// Ejecuta la consulta
$resultado = mysqli_query($conexion, $sql);
?>
<?php


if (isset($_POST['eliminar'])) {
    $idCategoriaEliminar = $_POST['idCategoria'];

    // Llamada a la función eliminarProducto
    if (eliminarCategoria($idCategoriaEliminar)) {
        // Producto eliminado con éxito, puedes redirigir o hacer otras acciones si es necesario
        header("Location: Categoria_admin.php");
    } else {
        // Manejar el caso de fallo en la eliminación
        echo "Error al eliminar el producto.";
    }
}



?>
<nav id="navigation">
    <div class="container">
        <div id="responsive-nav">
            <ul class="main-nav nav navbar-nav">
                <li><a href="Productos_admin.php">CRUD Productos</a></li>
                <li class="active"><a  href="Categoria_admin.php">CRUD Categorias</a></li>
                <li><a href="*">CRUD Marcas</a></li>
                
            </ul>
        </div>
    </div>
</nav>
<button onClick="redirect()" type="button" class="btn btn-success">Ingresar Categoria</button>
<script type="text/javascript">
    function redirect()
    {
   
    window.location.href="http://localhost/AmbienteWeb_Cliente-Servidor/SC_502%20Proyecto%20Final/Agregar_Categoria_Admin.php";
    
    }
    </script>
<table class="table table-striped" style="white-space: nowrap; overflow-x: auto;">
  <thead class="thead-dark">
    <tr>
     <th scope="col">ID Categoria</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  
  <tbody >
  <?php
            // Recorre los resultados de la consulta y muestra los productos
            while ($categoria = mysqli_fetch_assoc($resultado)) {

                ?>
    <tr>
        
      <th scope="row"><?php echo $categoria['idCategoria']; ?></th>
      <th scope="row"><?php echo $categoria['descripcion']; ?></th>

      <th>
      <form>
      <a href="Editar_Categoria_Admin.php?idCategoria= <?php echo $categoria['idCategoria'];?>">Modificar</a>
      </form>

      <form action="Categoria_admin.php" method="post">
      <input type="hidden" name="idCategoria" value="<?php echo $categoria['idCategoria']; ?>">
      <button type="submit" name="eliminar" class="btn btn-danger">Eliminar</button>
      </form>
      
      </th>
      
    
    <?php
            }
            ?>
    </tr>
  </tbody>

</table>





<?php
include 'templates/Footer.php';
?>