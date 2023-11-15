<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MENSAGES -->

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
        <form action="saveTask.php" method="POST">
          <div class="form-group">
            <textarea name="nombre" rows="2" class="form-control" placeholder="Nombre"></textarea>
          </div>
          <div class="form-group">
            <textarea name="apellido" rows="2" class="form-control" placeholder="Apellido"></textarea>
          </div>
          <div class="form-group">
            <textarea type="text"  name="telefono" rows="2" class="form-control" placeholder="Telefono"></textarea>
          </div>
          <div class="form-group">
            <textarea name="domicilio" rows="2" class="form-control" placeholder="Domicilio"></textarea>
          </div>
          <div class="form-group">
            <textarea name="correo" rows="2" class="form-control" placeholder="Correo"></textarea>
          </div>
          <div class="form-group">
            <textarea name="origen" rows="2" class="form-control" placeholder="Origen"></textarea>
          </div>
          <input type="submit" name="saveTask" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Id Empleado</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Telefono<o/th>
            <th>Domicilio</th>
            <th>Correo</th>
            <th>Fecha</th>
            <th>Origen</th>
            <th>Accion</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM task";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['idempleado']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['apellido']; ?></td>
            <td><?php echo $row['telefono']; ?></td>
            <td><?php echo $row['domicilio']; ?></td>
            <td><?php echo $row['correo']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td><?php echo $row['origen']; ?></td>
            <td>
              <a href="edit.php?idempleado=<?php echo $row['idempleado']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="deleteTask.php?idempleado=<?php echo $row['idempleado']?>" class="btn btn-danger">
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