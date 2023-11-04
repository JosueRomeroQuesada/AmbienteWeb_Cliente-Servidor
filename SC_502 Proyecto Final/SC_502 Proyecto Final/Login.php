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

<body>

    <main>

        <div class="container_all">
            <div class="back_box">
                <div class="back_box-login">
                <h3>Ya tienes una cuenta?</h3>
                    <p>Inicia sesion para entrar a la pagina</p>
                    <button id="btn__sing_in">Iniciar sesion</button>
                </div>
                <div class="back_box-register">
                    <h3>No tienes cuenta aún?</h3>
                    <p>Registrate para iniciar Sesion</p>
                    <button id="btn__register">Registrarse</button>
                </div>
            </div>

            <!--Form login and register-->
            <div class="container__login-register">
                <!--Login-->
                <form action="" method="POST" class="form__login">
                    <h2>Iniciar Sesion</h2>
                    <input type="email" placeholder="Correo" name='email' required>
                    <input type="password" placeholder="Contraseña" name='pass' required>
                    <button type="submit" name="btnLogin">Sign in</button>
                </form>

                <!--Register-->
                <form action="" method="POST" class="form__register">
                    <h2>Registrarse</h2>
                    <input type="text" placeholder="Nombres" name="name" required>
                    <input type="text" placeholder=" Apellidos" name="surname" required>
                    <input type="text" placeholder="Nombre de Usuario" name="user" required>
                    <input type="email" placeholder="Correo" name="email" required>
                    <input type="password" placeholder="Contraseña" name="pass" required>
                    <button type="submit" name="btnRegister">Registrarse</button>
                </form>

            </div>
        </div>
    </main>

</body>

</html>