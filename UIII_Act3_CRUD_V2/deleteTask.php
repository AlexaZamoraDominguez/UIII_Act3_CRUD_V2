<?php

include("db.php");

if(isset($_GET['idempleado'])) {
  $idempleado = $_GET['idempleado'];
  $query = "DELETE FROM task WHERE idempleado = $idempleado";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Consulta fallida.");
  }

  $_SESSION['message'] = 'Borrado con Exito';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>