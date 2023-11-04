<?php

include 'ConnDB.php';

function EmailVER($email) {
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    
    if ($link === false) {
        die("Error: No se pudo conectar a la base de datos. " . mysqli_connect_error());
    }

    $email = mysqli_real_escape_string($link, $email);
    
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($link, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        mysqli_close($link);
        return true; // Correo electrónico existe en la base de datos.
    } else {
        mysqli_close($link);
        return false; // Correo electrónico no existe en la base de datos.
    }
}

function UserVER($user) {
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if ($link === false) {
        die("Error: No se pudo conectar a la base de datos. " . mysqli_connect_error());
    }

    $user = mysqli_real_escape_string($link, $user);

    $sql = "SELECT * FROM users WHERE username = '$user'";
    $result = mysqli_query($link, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        mysqli_close($link);
        return true; // Usuario existe en la base de datos.
    } else {
        mysqli_close($link);
        return false; // Usuario no existe en la base de datos.
    }
}

function registerUser() {
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if ($link === false) {
        die("Error: No se pudo conectar a la base de datos. " . mysqli_connect_error());
    }

    // Agregar logica para registro de usuarios

    mysqli_close($link);
}

?>
