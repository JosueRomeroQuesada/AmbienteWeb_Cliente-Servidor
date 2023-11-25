<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LubriCentro</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <link rel="shortcut icon" href="imgs/shop.png" />
    <link rel="stylesheet" href="css/Login.css">

</head>
<?php

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once "include/functions/recoge.php";

    $nombre = recogePost("nombre");
    $correo = recogePost("correo");
    $contrasenna = recogePost("contrasenna");
    $apellido = recogePost("apellido");

    //Investigar expresiones regulares en php

    $nombreOK = false;
    $correoOK = false;
    $contrasennaOK= false;
    $apellidoOK =false;

    if ($nombre == "") {
        $errores[] = "No se digito el nombre del estudiante";
    } else {
        $nombreOK = true;
    }
    if ($correo == "") {
        $errores[] = "No se digito el correo del estudiante";
    } else {
        $correoOK = true;
    }
    
    
    if ($contrasenna == "") {
        $errores[] = "No se digito la contraseña del estudiante";
    } else {
        $contrasennaOK = true;
    }
    if ($apellido == "") {
        $errores[] = "No se digito el teléfono del estudiante";
    } else {
        $apellidoOK = true;
    }


    if ($nombreOK && $contrasennaOK && $correoOK&& $apellidoOK) {
        // echo "Ingreso de datos a la base de datos";
        require_once "DAL/usuario.php";
        if(Registro($nombre, $correo, $contrasenna,$apellido)){
            header("Location: index.php");
        }
    }
}

?>
<body>

    <main>

        <div class="container_all">
            <div class="back_box">
                <div class="back_box-login">
                
                </div>
                
            </div>

            <!--Form login and register-->
            <div class="container__login-register">
                
                <form  method="post" class="form__login">
                <h2>Registrarse</h2>
                    <input type="text" placeholder="Nombre" name="nombre" id="nombre" required>
                    <input type="email" placeholder=" Correo" name="correo" id="correo"required>
                    <input type="text" placeholder="Contraseña" name="contrasenna" id="contrasenna" required>
                    <input type="text" placeholder="Apellido" name="apellido" id="apellido" required>
                    
                    <button type="submit" name="btnRegister">Registrarse</button>
                </form>

               
                
            </div>
        </div>
    </main>

</body>

</html>