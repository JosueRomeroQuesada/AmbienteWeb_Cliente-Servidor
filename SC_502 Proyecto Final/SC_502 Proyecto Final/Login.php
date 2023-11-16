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

if ($_SERVER['REQUEST_METHOD'] === 'POST')  {
    require_once "include/functions/recoge.php";

    $correo = recogePost("correo");
    $contrasenna = recogePost("contrasenna");

    //Investigar expresiones regulares en php

    $correoOK= false;
    $contrasennaOK = false;

    if ($correo == "") {
        $errores[] = "El email es obligatorio o no válido";
    } 
    else
    {
        $correoOK= true;
    }
    if ($contrasenna == "") {
        $errores[] = "El password es obligatorio";
    }
    else
    {
        $contrasennaOK= true;
    }
    if ($correoOK && $contrasennaOK ) {
        // echo "Ingreso de datos a la base de datos";
        require_once "DAL/usuario.php";
        if(Verificar($correo,$contrasenna)){
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