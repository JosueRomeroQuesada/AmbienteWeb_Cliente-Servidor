<?php

session_start();

if(isset($_SESSION['usuario'])){
    header("Location: index.php");
}

function Verification_login($correo, $contrasenna)
{
    include 'DAL/conexion.php';

    // Conecta a la base de datos MySQL.
    $link = mysqli_connect("localhost", "root", "", "lubricentro");

    // Verifica si la conexión fue exitosa.
    if ($link === false) {
        die("Error: No se pudo conectar a la base de datos. " . mysqli_connect_error());
    }

    // Escapa los valores de $email y $pass para evitar la inyección de SQL.
    $correo = mysqli_real_escape_string($link, $correo);

    // Realiza la consulta SQL para verificar las credenciales.
    $sql = "SELECT * FROM usuario WHERE correo = ? AND contrasenna = ?";
    $stmt = mysqli_prepare($link, $sql);
    if (!$stmt) {
        die("Error al preparar la sentencia: " . mysqli_error($link));
    }
    mysqli_stmt_bind_param($stmt, "ss", $correo, $contrasenna);
    mysqli_stmt_execute($stmt);
    if (mysqli_stmt_errno($stmt)) {
        die("Error al ejecutar la sentencia: " . mysqli_stmt_error($stmt));
    }
    mysqli_stmt_store_result($stmt);

    // Verifica si la consulta tuvo éxito y si se encontraron registros.
    if (mysqli_stmt_num_rows($stmt) > 0) {
        mysqli_stmt_close($stmt);
        mysqli_close($link);
        return true; // Credenciales válidas.
    } else {
        mysqli_stmt_close($stmt);
        mysqli_close($link);
        return false; // Credenciales no válidas.
    }
}

?>