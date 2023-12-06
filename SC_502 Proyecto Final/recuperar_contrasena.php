<?php
// Archivo: recuperar_contrasena.php
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once "DAL/usuario.php"; // Asegúrate de que la ruta sea correcta y el archivo exista

    $correoRecuperar = filter_input(INPUT_POST, 'correo_recuperar', FILTER_SANITIZE_EMAIL);

    if (filter_var($correoRecuperar, FILTER_VALIDATE_EMAIL)) {
        if (recuperarContrasena($correoRecuperar)) {
            $mensaje = "Se ha enviado una nueva contraseña al correo electrónico.";
        } else {
            $error = "El correo electrónico no está registrado en la base de datos.";
        }
    } else {
        $error2 = "Por favor, ingresa un correo electrónico válido.";
    }
}
?>

 
 <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/recuperar-pass.css" />
    <link type="text/css" rel="stylesheet" href="css/style.css" />

</head>
<body>


 <!-- MAIN HEADER -->
 <div id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="header-logo">
                    <h1 style="color: white">Recuperar<span style="color: red"> C</span>ontraseña</h1>
                </div>
            </div>
        </div>
    </div>
</div>



    <?php
    if (isset($mensaje)) {
        echo "<p style='color:green;'>$mensaje</p>";
    }

    if (isset($error, $error2)) {
        echo "<p style='color:red;'>$error</p>";
    }
    ?>

    <form method="post" action="">
        <p>Por favor, ingresa tu dirección de correo electrónico para recuperar tu contraseña.</p>
        <label for="correo_recuperar">Correo Electrónico:</label>
        <input type="email" id="correo_recuperar" name="correo_recuperar" required>
        <button type="submit">Recuperar Contraseña</button>
    </form>
</body>
</html>

