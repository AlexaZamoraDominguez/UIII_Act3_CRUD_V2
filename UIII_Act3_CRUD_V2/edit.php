<?php
include("db.php");
$nombre = '';
$apellido= '';
$telefono= '';
$domicilio= '';
$correo= '';
$origen= '';


if  (isset($_GET['idempleado'])) {
  $idempleado = $_GET['idempleado'];
  $query = "SELECT * FROM task WHERE idempleado=$idempleado";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
    $telefono = $row['telefono'];
    $domicilio = $row['domicilio'];
    $correo = $row['correo'];
    $origen = $row['origen'];

  }
}

if (isset($_POST['update'])) {
  $idempleado = $_GET['idempleado'];
  $nombre= $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $telefono = $_POST['telefono'];
  $domicilio = $_POST['domicilio'];
  $correo = $_POST['correo'];
  $origen = $_POST['origen'];

  $query = "UPDATE task set nombre = '$nombre', apellido = '$apellido', telefono = '$telefono', domicilio = '$domicilio', correo = '$correo', origen = '$origen' WHERE idempleado=$idempleado";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Actualizado con Exito';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?idempleado=<?php echo $_GET['idempleado']; ?>" method="POST">
        <div class="form-group">
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Update nombre">
        </div>
        <div class="form-group">
        <textarea name="apellido" class="form-control" cols="30" rows="10"><?php echo $apellido;?></textarea>
        </div>
        <div class="form-group">
        <textarea name="telefono" class="form-control" cols="30" rows="10"><?php echo $telefono;?></textarea>
        </div>
        <div class="form-group">
        <textarea name="domicilio" class="form-control" cols="30" rows="10"><?php echo $domicilio;?></textarea>
        </div>
        <div class="form-group">
        <textarea name="correo" class="form-control" cols="30" rows="10"><?php echo $correo;?></textarea>
        </div>
        <div class="form-group">
        <textarea name="origen" class="form-control" cols="30" rows="10"><?php echo $origen;?></textarea>
        </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>