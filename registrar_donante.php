<?php
  
  // Llamas a la función conexionDB.php
  include_once 'conexionDB.php';

  //función para filtrar los datos
  function filtrar($dato) {
    return htmlspecialchars(stripslashes(trim($dato)));
  }

  $nombre = filtrar($_POST['name']);
  $email = filtrar($_POST['email']);
  $direccion = filtrar($_POST['direccion']);
  $telefono = filtrar($_POST['telefono']);

  // Insertar datos en la base de datos
  $sqlInsert = "INSERT INTO DONANTE (nombre, email, direccion, telefono) VALUES ('$nombre', '$email', '$direccion', '$telefono')";

  if ($conn->query($sqlInsert) === TRUE) {
    echo "<script>alert('Donante registrado correctamente.');window.history.back();</script>";

  } else {
      echo "Error: " . $sqlInsert . $conn->error;
  }

  $conn->close();
?>
