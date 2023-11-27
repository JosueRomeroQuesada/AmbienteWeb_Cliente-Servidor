<?php
include 'templates/Header.php';
include 'ConnDB.php';



// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Llama a la función para agregar el producto
    require_once "include/functions/recoge.php";
    


    $descripcion = recogePost("descripcion");
    

    require_once "DAL/Categoria.php";
    agregarCategoria($descripcion);

    
}

?>



<form  method="post">
<div class="form-group">
    <label for="descripcion">Descripción: </label>
    <input class="form-control" type="text" id="descripcion" name="descripcion" placeholder="Ingrese la nueva categoria" required>
   
   

    <button class="btn btn-success" type="submit">Agregar Producto</button>
</form>

</body>

</html>


<?php
include 'templates/Footer.php';
?>