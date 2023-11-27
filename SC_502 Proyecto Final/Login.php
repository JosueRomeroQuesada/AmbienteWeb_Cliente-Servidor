<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LubriCentro</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <link rel="shortcut icon" href="img/logo2.png" />

    <link rel="stylesheet" href="css/Login.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

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

    <!-- <div class="container">
        <a href="../index.php">
            <button class="btn mt-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                </svg>
                Atras
            </button>
        </a>
    </div> -->

        <div class="container_all">

            <div class="back_box">
                <div class="back_box-login">
                    <h3>Ya tienes una cuenta?</h3>
                    <p>Inicia sesion para entrar en la pagina</p>
                    <button id="btn__sing_in">Inicias Sesión</button>
                </div>
                <div class="back_box-register">
                    <h3>No tienes una cuenta aún?</h3>
                    <p>Regístrate con nosotros aquí</p>
                    <button id="btn__register">Registarse</button>

                    <button id="btn__forgot_password" onclick="window.location.href='recuperar_contrasena.php'">Olvidé mi contraseña</button>

                </div>
            </div>

            <!--Form login and register-->
            <div class="container__login-register">
                <!--Login-->
                <form method="post" class="form__login">
                    <h2>Iniciar Sesion</h2>
                    <input type="email" name='correo' id="correo"  placeholder="Correo"   >
                    <input type="password" name='contrasenna' id="contrasenna" placeholder="Contraseña"   >
                    <button type="submit" name="btnLogin">Iniciar Sesión</button>
                </form>

                <!--Register-->
                <form action="" method="POST" class="form__register">
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

    <script src="js/Login.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>