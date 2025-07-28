<?php

    include_once 'conexionDB.php';
    
    //función para filtrar los datos
    function filtrar($dato) {
        return htmlspecialchars(stripslashes(trim($dato)));
    }

    $monto = filtrar($_POST['monto']);
    $fecha = filtrar($_POST['fecha']);
    $id_proyecto = filtrar($_POST['id_proyecto']);
    $id_donante = filtrar($_POST['id_donante']);
    
    $sql = "SELECT INTO DONACION (monto, fecha, id_proyecto, id_donante) VALUES ('$monto', '$fecha', '$id_proyecto', '$id_donante')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Donación registrada correctamente.');window.history.back();</script>";
        
    } else {
        echo "Error: " . $sqlInsert . $conn->error;
    }

    $conn->close();
    
    
?>