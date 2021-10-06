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
        <form action="save_task.php" method="POST">
          <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre" autofocus>
          </div>
           <div class="form-group">
            <input type="text" name="apellido" class="form-control" placeholder="Apellido" autofocus>
          </div>
           <div class="form-group">
            <input type="text" name="identificacion" class="form-control" placeholder="Identificacion" autofocus>
          </div>
           <div class="form-group">
            <input type="text" name="sexo" class="form-control" placeholder="Sexo" autofocus>
          </div>
          
          <input type="submit" name="save_task" class="btn btn-success btn-block" value="REGISTRARSE">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Identificacion</th>
            <th>Sexo</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM cliente";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['apellido']; ?></td>
            <td><?php echo $row['identificacion']; ?></td>
             <td><?php echo $row['sexo']; ?></td>
            <td>
              <a href="edit.php?id_cliente=<?php echo $row['id_cliente']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id_cliente=<?php echo $row['id_cliente']?>" class="btn btn-danger">
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