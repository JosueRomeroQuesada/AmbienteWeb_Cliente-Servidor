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

define("KEY","KDOY2022.pr0t");
define("COD","AES-128-ECB");  

function SendEmail($addressee, $subject_, $body_email){
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

 $mail = new PHPMailer();
 $mail -> Charset = 'UTF-8';

$mail -> IsSMTP();
$mail -> Host = 'smtp.office365.com';
$mail -> SMTPSecure = 'tls';
$mail -> Port = 587;   //for SSL 465
$mail -> SMTPAuth = true;
$mail -> Username = 'lubricentro2023@outloook.com';
$mail -> Password = 'Lubric3ntro';
$mail -> SetFrom('lubricentro2023@outloook.com',"Lubric3ntro");
$mail -> Subject = $subject_;
$mail -> MsgHTML($body_email);
$mail -> AddAddress($addressee, 'Customer');

$mail -> send();

}