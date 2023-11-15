<?php

include('db.php');

if (isset($_POST['saveTask'])) {
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $telefono = $_POST['telefono'];
  $domicilio = $_POST['domicilio'];
  $correo = $_POST['correo'];
  $origen = $_POST['origen'];
  $query = "INSERT INTO task(nombre, apellido, telefono, domicilio, correo, origen) VALUES ('$nombre', '$apellido', '$telefono', '$domicilio', '$correo', '$origen')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Consulta Fallida.");
  }

  $_SESSION['message'] = 'Guardado Correctamente';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>