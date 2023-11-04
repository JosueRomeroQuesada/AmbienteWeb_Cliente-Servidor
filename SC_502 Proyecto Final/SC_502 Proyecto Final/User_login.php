<?php

session_start();

if(isset($_SESSION['user'])){
    header("Location: index.php");
}

function Verification_login($email, $pass)
{
    include 'ConnDB.php';

    // Conecta a la base de datos MySQL.
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // Verifica si la conexión fue exitosa.
    if ($link === false) {
        die("Error: No se pudo conectar a la base de datos. " . mysqli_connect_error());
    }

    // Escapa los valores de $email y $pass para evitar la inyección de SQL.
    $email = mysqli_real_escape_string($link, $email);

    // Realiza la consulta SQL para verificar las credenciales.
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";
    $result = mysqli_query($link, $sql);

    // Verifica si la consulta tuvo éxito y si se encontraron registros.
    if ($result && mysqli_num_rows($result) > 0) {
        mysqli_close($link); // Cierra la conexión a la base de datos.
        return true; // Credenciales válidas.
    } else {
        mysqli_close($link); // Cierra la conexión a la base de datos.
        return false; // Credenciales no válidas.
    }
}

?>