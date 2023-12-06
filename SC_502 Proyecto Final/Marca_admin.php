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
require_once "DAL/Marca.php";
?>

<?php
$conexion = ConnectDB();
// Consulta SQL para obtener los productos de la categoría 
$sql = "SELECT * FROM marca ORDER BY idMarca;";
// Ejecuta la consulta
$resultado = mysqli_query($conexion, $sql);
?>
<?php


if (isset($_POST['eliminar'])) {
    $idMarcaEliminar = $_POST['idMarca'];

    // Llamada a la función eliminarProducto
    if (eliminarMarca($idMarcaEliminar)) {
        // Producto eliminado con éxito, puedes redirigir o hacer otras acciones si es necesario
        header("Location: Marca_admin.php");
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
                <li ><a  href="Categoria_admin.php">CRUD Categorias</a></li>
                <li class="active"><a href="Marca_admin.php">CRUD Marcas</a></li>
                
            </ul>
        </div>
    </div>
</nav>
<button onClick="redirect()" type="button" class="btn btn-success">Ingresar Marca</button>
<script type="text/javascript">
    function redirect()
    {
   
    window.location.href="http://localhost/AmbienteWeb_Cliente-Servidor/SC_502%20Proyecto%20Final/Agregar_Marca_Admin.php";
    
    }
    </script>
<table class="table table-striped" style="white-space: nowrap; overflow-x: auto;">
  <thead class="thead-dark">
    <tr>
     <th scope="col">ID Marca</th>
      <th scope="col">Nombre marca</th>
      <th scope="col">descripcion</th>
      <th scope="col">opciones</th>
    </tr>
  </thead>
  
  <tbody >
  <?php
            // Recorre los resultados de la consulta y muestra los productos
            while ($Marca = mysqli_fetch_assoc($resultado)) {

                ?>
    <tr>
        
      <th scope="row"><?php echo $Marca['idMarca']; ?></th>
      <th scope="row"><?php echo $Marca['nombreMarca']; ?></th>
      <th scope="row"><?php echo $Marca['descripcion']; ?></th>

      <th>
      <form>
      <a href="Editar_Marca_Admin.php?idMarca= <?php echo $Marca['idMarca'];?>">Modificar</a>
      </form>

      <form action="Marca_admin.php" method="post">
      <input type="hidden" name="idMarca" value="<?php echo $Marca['idMarca']; ?>">
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