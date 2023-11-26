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
require_once "DAL/productos.php";
?>

<?php
$conexion = ConnectDB();
// Consulta SQL para obtener los productos de la categoría "Aceites"
$sql = "SELECT * FROM producto ORDER BY idProducto;"; //"Aceites" tiene idCategoria = 1
// Ejecuta la consulta
$resultado = mysqli_query($conexion, $sql);
?>
<?php


if (isset($_POST['eliminar'])) {
    $idProductoEliminar = $_POST['idProducto'];

    // Llamada a la función eliminarProducto
    if (eliminarProducto($idProductoEliminar)) {
        // Producto eliminado con éxito, puedes redirigir o hacer otras acciones si es necesario
        header("Location: Productos_admin.php");
    } else {
        // Manejar el caso de fallo en la eliminación
        echo "Error al eliminar el producto.";
    }
}



?>

<button onClick="redirect()" type="button" class="btn btn-success">Ingresar elemento</button>
<script type="text/javascript">
    function redirect()
    {
   
    window.location.href="http://localhost/AmbienteWeb_Cliente-Servidor/SC_502%20Proyecto%20Final/Agregar_Producto_Admini.php";
    
    }
    </script>
<table class="table table-striped" style="white-space: nowrap; overflow-x: auto;">
  <thead class="thead-dark">
    <tr>
     <th scope="col">ID</th>
      <th scope="col">Imagen</th>
      <th scope="col">Description</th>
      <th scope="col">Id marca</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Precio</th>
      <th scope="col">idCategoria</th>
      <th scope="col">informacion</th>
      <th scope="col">Activo</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  
  <tbody >
  <?php
            // Recorre los resultados de la consulta y muestra los productos
            while ($producto = mysqli_fetch_assoc($resultado)) {

                ?>
    <tr>
        
      <th scope="row"><?php echo $producto['idProducto']; ?></th>
      <td><img class="card-img-top custom-img-size" src="<?php echo $producto['imagen']; ?>" alt=""></td>
      <th scope="row"><?php echo $producto['descripcion']; ?></th>
      <th scope="row"><?php echo $producto['idMarca']; ?></th>
      <th scope="row"><?php echo $producto['Cantidad']; ?></th>
      <th scope="row"><?php echo $producto['Precio']; ?></th>
      <th scope="row"><?php echo $producto['idCategoria']; ?></th>
      
      <th scope="row"><?php echo $producto['informacion']; ?></th>
      <th scope="row"><?php echo $producto['activo']; ?></th>
      <th scope="row">
        
      <form>
      <a href="Editar_Producto_Admini.php?idProducto= <?php echo $producto['idProducto'];?>">Modificar</a>
      </form>

      <form action="productos_admin.php" method="post">
      <input type="hidden" name="idProducto" value="<?php echo $producto['idProducto']; ?>">
      <button type="submit" name="eliminar" class="btn btn-danger">Eliminar</button>
      </form>
      
      </th>
      
    </tr>
    <?php
            }
            ?>
  </tbody>
</table>





<?php
include 'templates/Footer.php';
?>