
<?php
include 'templates/Header.php';
include 'ConnDB.php';
?>
<?php 
$oConexion = ConnectDB();
$id = $_GET['idMarca'];
$m = "SELECT * FROM marca WHERE idMarca = '$id'";
$modificar = ConnectDB() ->query($m);
$dato = $modificar ->fetch_array();


?>
<?php



// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Llama a la función para agregar el producto
    require_once "include/functions/recoge.php";
    


    $nombreMarca = recogePost("nombreMarca");
    $descripcion = recogePost("descripcion");
    

    require_once "DAL/Marca.php";
    modificarMarca($id,$nombreMarca , $descripcion);
    header("Location: Marca_admin.php");

}

?>

<form  method="post">
<div class="form-group">

    <label for="descripcion">NOMBRE:</label>
    <input class="form-control" type="text" id="nombreMarca" name="nombreMarca" value ="<?php echo $dato['nombreMarca'] ?>" required>

    <label for="descripcion">Descripción:</label>
    <input class="form-control" type="text" id="descripcion" name="descripcion" value ="<?php echo $dato['descripcion'] ?>" required>

    <button type="submit">Editar idMarca</button>
</form>
</body>
</html>


<?php
include 'templates/Footer.php';
?>