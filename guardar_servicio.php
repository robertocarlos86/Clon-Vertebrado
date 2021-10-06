<?php

include('db.php');

if (isset($_POST['guardar_servicio'])) {
  $servicio = $_POST['servicio'];
  $descripcion = $_POST['descripcion'];
   $valor = $_POST['valor'];
    
  $query = "INSERT INTO servicio(servicio, descripcion, valor) VALUES ('$servicio', '$descripcion', '$valor')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Operacion Fallida.");
  }

  $_SESSION['message'] = 'Servicio Agregado con Exito';
  $_SESSION['message_type'] = 'success';
  header('Location: servicios.php');

}

?>