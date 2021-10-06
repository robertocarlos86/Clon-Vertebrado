<?php
include("db.php");
$servicio = '';
$descripcion= '';
$valor = '';


if  (isset($_GET['id_servicio'])) {
  $id_servicio = $_GET['id_servicio'];
  $query = "SELECT * FROM servicio WHERE id_servicio=$id_servicio";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $servicio = $row['servicio'];
    $descripcion = $row['descripcion'];
    $valor = $row['valor'];
    
  }
}

if (isset($_POST['update'])) {
  $id_cliente = $_GET['id_servicio'];
  $servicio= $_POST['servicio'];
  $descripcion = $_POST['descripcion'];
  $valor= $_POST['valor'];


  $query = "UPDATE servicio set servicio = '$servicio', descripcion = '$descripcion', valor = '$valor' WHERE id_servicio=$id_servicio";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Servicio Actualizado con Exito';
  $_SESSION['message_type'] = 'warning';
  header('Location: servicios.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editar_servicio.php?id_servicio=<?php echo $_GET['id_servicio']; ?>" method="POST">
        <div class="form-group">
          <input name="servicio" type="text" class="form-control" value="<?php echo $servicio; ?>" placeholder="Actualiza Servicio">
        </div>
        <div class="form-group">
          <input name="descripcion" type="text" class="form-control" value="<?php echo $descripcion; ?>" placeholder="Actualiza Descripcion">
        </div>
        <div class="form-group">
          <input name="valor" type="text" class="form-control" value="<?php echo $valor; ?>" placeholder="Actualiza Valor">
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