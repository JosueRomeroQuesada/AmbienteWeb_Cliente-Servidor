<?php
// Archivo: recuperar_contrasena.php
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once "DAL/usuario.php"; // Reemplaza con el nombre real de tu archivo de funciones
 
    $correoRecuperar = $_POST['correo_recuperar'];
 
    if (recuperarContrasena($correoRecuperar)) {
        $mensaje = "Se ha enviado una nueva contraseña al correo electrónico.";
    } else {
        $error = "El correo electrónico no está registrado en la base de datos.";
    }
}
?>
 
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Recuperar Contraseña</title>
</head>
<body>
<h1>Recuperar Contraseña</h1>
 
    <?php
    if (isset($mensaje)) {
        echo "<p style='color:green;'>$mensaje</p>";
    }
 
    if (isset($error)) {
        echo "<p style='color:red;'>$error</p>";
    }
    ?>
 
    <form method="post" action="">
<label for="correo_recuperar">Correo Electrónico:</label>
<input type="email" id="correo_recuperar" name="correo_recuperar" required>
<button type="submit">Recuperar Contraseña</button>
</form>
</body>
</html>