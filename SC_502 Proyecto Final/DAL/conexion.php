<?php

function Conecta() {
    $server = "localhost";
    $user = "root";
    $password = "";
    $dataBase = "lubricentro";

    //1. Establecer la conexión
    $conexion = mysqli_connect($server, $user, $password, $dataBase);

    if(!$conexion){
        echo "Ocurrió un error al establecer la conexión: " . mysqli_connect_error();
    }

    return $conexion;
}

function Desconecta($conexion) {
    mysqli_close($conexion);
}

// define("KEY", "KDOY2022.pr0t");
// define("COD", "AES-128-ECB");

// function SendEmail($addressee, $subject_, $body_email){
//     require 'PHPMailer/src/PHPMailer.php';
//     require 'PHPMailer/src/SMTP.php';

//     $mail = new PHPMailer(true); // Se agrega el parámetro true para mostrar errores si los hay
//     $mail->CharSet = 'UTF-8';

//     try {
//         $mail->isSMTP();
//         $mail->Host = 'smtp.office365.com';
//         $mail->SMTPSecure = 'tls';
//         $mail->Port = 587;   // for SSL 465
//         $mail->SMTPAuth = true;
//         $mail->Username = 'lubricentro2023@outlook.com'; // Corregido aquí
//         $mail->Password = 'Lubric3ntro';
//         $mail->setFrom('lubricentro2023@outlook.com', 'Lubric3ntro'); // Corregido aquí
//         $mail->Subject = $subject_;
//         $mail->msgHTML($body_email);
//         $mail->addAddress($addressee, 'Customer');

//         $mail->send();
//         return true;
//     } catch (Exception $e) {
//         // Puedes agregar un log o manejo de errores aquí
//          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
//         return false;
//     }
// }
