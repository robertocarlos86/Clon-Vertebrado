<?php
include("db.php");
$nombre = '';
$apellido= '';
$identificacion = '';
$sexo = '';

if  (isset($_GET['id_cliente'])) {
  $id_cliente = $_GET['id_cliente'];
  $query = "SELECT * FROM cliente WHERE id_cliente=$id_cliente";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
    $identificacion = $row['identificacion'];
    $sexo = $row['sexo'];
  }
}

if (isset($_POST['update'])) {
  $id_cliente = $_GET['id_cliente'];
  $nombre= $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $identificacion= $_POST['identificacion'];
  $sexo = $_POST['sexo'];

  $query = "UPDATE cliente set nombre = '$nombre', apellido = '$apellido', identificacion = '$identificacion', sexo = '$sexo' WHERE id_cliente=$id_cliente";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Cliente Actualizado con Exito';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id_cliente=<?php echo $_GET['id_cliente']; ?>" method="POST">
        <div class="form-group">
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Actualiza Nombre">
        </div>
        <div class="form-group">
          <input name="apellido" type="text" class="form-control" value="<?php echo $apellido; ?>" placeholder="Actualiza Apellido">
        </div>
        <div class="form-group">
          <input name="identificacion" type="text" class="form-control" value="<?php echo $identificacion; ?>" placeholder="Actualiza Identificacion">
        </div>
        <div class="form-group">
          <input name="sexo" type="text" class="form-control" value="<?php echo $sexo; ?>" placeholder="Actualiza Sexo">
        </div>
      
        <button class="btn-success" name="update">
          EDITAR
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>