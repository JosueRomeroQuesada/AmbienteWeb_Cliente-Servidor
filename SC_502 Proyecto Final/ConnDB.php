<?php

//cambiar los nombres si es necesario para que la base de datos conecte correctamente
function ConnectDB() {
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

function Desconecta2($conexion) {
  mysqli_close($conexion);
}
    
?>