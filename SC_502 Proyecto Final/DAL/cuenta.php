<?php
include '../ConnDB.php';
session_start();
if(!isset($_SESSION['user'])){
header("Location: /AmbienteWeb_Cliente-Servidor/SC_502 Proyecto Final/SC_502 Proyecto Final/DAL/cuenta.php");
}


$ses = $_SESSION['user'];

// Conexión a la base de datos MySQL
$mysqli = new mysqli("localhost", "root", "", "lubricentro");

// Verificar la conexión
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

// Llamada a un procedimiento almacenado en MySQL
$sql = "CALL MostrarCuenta(?, @result)";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $ses);
$stmt->execute();

// Obtener el resultado del procedimiento almacenado
$result = $mysqli->query("SELECT @result AS result, @nombre AS nombre");
//*******************el error esta aqui abajo***********************************
// $row = $result->fetch_assoc();

// Trabajar con los resultados
if ($row['result'] == 1) {
    // Accede a los datos del usuario
    if (isset($row['nombre'])) {
        echo utf8_decode($row['nombre']);
    } else {
        echo "Nombre no disponible";
    }
} else {
    // El procedimiento almacenado no se ejecutó correctamente
    // Muestra mensajes de error detallados
    echo "Error en el procedimiento almacenado: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$mysqli->close();
?>

<!DOCTYPE html>

<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mi Cuenta</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/account.css">

</head>

<body>
    <div class="container">
        <a href="../index.php">
            <button class="btn mt-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                </svg>
                Back
            </button>
        </a>
        <div class="wrapper">
            <div class="logo"> <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="">
            </div>
            <div class="text-center mt-4 name">  Información de Cuenta </div>
            <div class="p-3 mt-3">

                <div class="row">
                    <div class="col-md-6">
                        <h5>Nombre:</h5>
                        <div class="form-field d-flex align-items-center">
                            <?php echo utf8_decode($row['nombre']); ?>
                            <input type="text" name="nombre" disabled="disabled">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5>Apellido:</h5>
                        <div class="form-field d-flex align-items-center">
                            <?php echo utf8_decode($row['apellido']); ?>
                            <input type="text" name="apellido" disabled="disabled">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h5>Correo:</h5>
                        <div class="form-field d-flex align-items-center">
                            <?php echo utf8_decode($row['correo']); ?>
                            <input type="text" name="correo" disabled="disabled">
                        </div>
                    </div>

                <a href="Logout.php">
                    <button class="btn mt-3">Cerrar Sesion
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                            <path fill-rule="evenodd"
                                d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                        </svg>
                    </button>
                </a>
            </div>

        </div>
    </div>
</body>

</html>