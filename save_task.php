<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
   $identificacion = $_POST['identificacion'];
    $sexo = $_POST['sexo'];
  $query = "INSERT INTO cliente(nombre, apellido, identificacion, sexo) VALUES ('$nombre', '$apellido', '$identificacion', '$sexo')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Operacion Fallida.");
  }

  $_SESSION['message'] = 'Cliente Agregado con Exito';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>