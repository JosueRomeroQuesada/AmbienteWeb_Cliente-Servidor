<?php

function ConnectDB() {
  $server = "localhost:3305";
  $user = "root";
  $password = "";
  $dataBase = "lubricentro";

  $conexion = mysqli_connect($server, $user, $password, $dataBase);

  if(!$conexion){
      echo "Ocurrió un error al establecer la conexión: " . mysqli_connect_error();
  }

  return $conexion;
}

function Desconecta2($conexion) {
  mysqli_close($conexion);
}
    
?>
