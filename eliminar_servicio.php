<?php

include("db.php");

if(isset($_GET['id_servicio'])) {
  $id_servicio = $_GET['id_servicio'];
  $query = "DELETE FROM servicio WHERE id_servicio = $id_servicio";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Operacion Fallida.");
  }

  $_SESSION['message'] = 'Servicio Eliminado Correctamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: servicios.php');
}

?>