<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="guardar_servicio.php" method="POST">
          <div class="form-group">
            <input type="text" name="servicio" class="form-control" placeholder="Servicio" autofocus>
          </div>
           <div class="form-group">
            <input type="text" name="descripcion" class="form-control" placeholder="Descripcion" autofocus>
          </div>
           <div class="form-group">
            <input type="text" name="valor" class="form-control" placeholder="Valor" autofocus>
          </div>
           
          
          <input type="submit" name="guardar_servicio" class="btn btn-success btn-block" value="GUARDAR">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Servicio</th>
            <th>Descripcion</th>
            <th>Valor</th>
            </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM servicio";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['servicio']; ?></td>
            <td><?php echo $row['descripcion']; ?></td>
            <td><?php echo $row['valor']; ?></td>
            <td>
              <a href="editar_servicio.php?id_servicio=<?php echo $row['id_servicio']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="eliminar_servicio.php?id_servicio=<?php echo $row['id_servicio']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>