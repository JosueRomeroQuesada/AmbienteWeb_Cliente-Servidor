<?php
include 'templates/Header.php';
include 'ConnDB.php';

?>

<?php
$conexion = ConnectDB();
// Consulta SQL para obtener los productos de la categoría "Aceites"
$sql = "SELECT * FROM producto WHERE idCategoria = 3"; //"Aceites" tiene idCategoria = 1
// Ejecuta la consulta



$resultado = mysqli_query($conexion, $sql);
?>

<!-- NAVEGACION ---- pestañas de navegación-->
<nav id="navigation">
    <div class="container">
        <div id="responsive-nav">
            <ul class="main-nav nav navbar-nav">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="Aceites.php">Aceites</a></li>
                <li><a href="Accesorios.php">Accesorios</a></li>
                <li class="active"><a href="Componentes.php">Componentes</a></li>
                <li><a href="Servicios.php">Servicios</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- /NAVEGACION -->


<!-- SECTION -------- panel donde se muestra todos los productos -->
<div class="section">
    <div class="container">
        <div class="row">
            <?php
            while ($producto = mysqli_fetch_assoc($resultado)) {
                ?>
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card custom-card">
                        <img class="card-img-top" src="<?php echo $producto['imagen']; ?>" alt="">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $producto['descripcion']; ?></h5>
                            <p class="card-text">Precio: ₡<?php echo $producto['Precio']; ?></p>
                            <form action="agregar_al_carrito.php" method="post">
                                <input type="hidden" name="producto_id" value="<?php echo $producto['idProducto']; ?>">
                                <input type="hidden" name="nombre" value="<?php echo $producto['descripcion']; ?>"> 
                                <input type="number" name="cantidad" value="1" min="1" max="<?php echo $producto['Cantidad']; ?>">
                                <button type="submit" class="btn btn-primary">Agregar al carrito</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>

<?php
Desconecta($conexion);
include 'templates/Footer.php';
?>