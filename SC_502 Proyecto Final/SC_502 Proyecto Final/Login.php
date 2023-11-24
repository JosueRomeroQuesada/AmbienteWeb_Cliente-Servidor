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

if(isset($_POST["btnLogin"]))
{
    include 'User_login.php';
    $correo = $_POST["correo"];
    $contrasenna = $_POST["contrasenna"];
    $_login_verification = Verification_login($correo,$contrasenna);

    if($_login_verification > 0){
        
        $_SESSION['usuario'] = $correo;
        header("location: index.php"); 
    }
    else
    {
        $_SESSION['usuario'] = null;
        echo ' <script type="text/javascript">
        $(document).ready(function() {  
            Swal.fire({
                icon: "error",
                title: "Vaya...",
                text: "Lo sentimos, su correo electronico o contraeña son incorrectos, intentelo de nuevo."
            }).then(function() {
            document.location.href = "/AmbienteWeb_Cliente-Servidor/SC_502 Proyecto Final/SC_502 Proyecto Final/Login.php";
            })});
        </script>';
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
                <!--Login-->
                <form method="post" class="form__login">
                    <h2>Iniciar Sesion</h2>
                    <input type="email" name='correo' id="correo"  placeholder="correo"   >
                    <input type="password" name='contrasenna' id="contrasenna" placeholder="contraseña"   >
                    <?php
            
        ?>

                    <button type="submit" name="btnLogin">Sign in</button>
                </form>

                
                

            </div>
        </div>
    </main>

</body>

</html>