<?php

include("db.php");

if(isset($_GET['id_cliente'])) {
  $id_cliente = $_GET['id_cliente'];
  $query = "DELETE FROM cliente WHERE id_cliente = $id_cliente";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Operacion Fallida.");
  }

  $_SESSION['message'] = 'Cliente Eliminado Correctamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>