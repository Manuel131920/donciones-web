<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/donacion.css">
    <title>Donación</title>

    <script>
        
        function validarCampos() {
            let monto = document.getElementById('monto').value;
            let fecha = document.getElementById('fecha').value;
            let id_proyecto = document.getElementById('id_proyecto').value;
            let id_donante = document.getElementById('id_donante').value;

            if (monto === '' || fecha === '' || id_proyecto === '' || id_donante === '') {
                alert('Ningun campo debe de estar vaciío.');
                return false;
            }
            return true;
        }

        // Función cancelar
        function cancelarDonacion() {
            
            document.getElementById("monto").value = "";
            document.getElementById("fecha").value = "";
            document.getElementById("id_proyecto").value = "";
            document.getElementById("id_donante").value = "";

            // verifica si hay una ventana que abrió esta (la pestaña de index.html)
            if (window.opener) {
                // retrocede la ventana que la abrió
                window.opener.location.href = 'indexx1.html';
            }
            // cierra la ventana o pestaña actual
            window.close();
        }

        function validarFormulario() {
          var nombre = document.getElementById("nombre").value;
          if (nombre.trim() === "") {
            alert("Por favor ingresa tu nombre.");
            return false;
          }
          return true;
    }

    </script>
</head>
<body>
    <h1>Organización sin fines de lucro</h1>
    <h2>formulario para Realizar Donaciones</h2>

    <div class="frm_donacion">
        <form action="registrar_donacion.php" method="post" onsubmit="return validarCampos()">
            <div class="lbl_monto">
                <label for="monto">Monto:</label>
                <input type="number" name="monto" id="monto" min="1">
            </div>

            <div class="lbl_fecha">
                <label for="fecha">Fecha:</label>
                <input type="date" name="fecha" id="fecha">
            </div>

            <div class="lbl_proyecto">
                <label for="id_proyecto">Proyecto:</label>
                <select name="id_proyecto" id="id_proyecto">
                    <option value="">Selecciona un Proyecto</option>
                    <?php
                        include_once 'conexionDB.php';

                        $sqlProyecto = "SELECT id_proyecto, nombre FROM PROYECTO";
                        $resultProyecto = $conn->query($sqlProyecto);

                        if ($resultProyecto->num_rows > 0) {
                            
                            while ($rowProyecto = $resultProyecto->fetch_assoc()) {
                                echo "<option value='" . $rowProyecto['id_proyecto'] ."'>" . $rowProyecto['nombre'] . "</option>";
                            }

                        } else {
                            echo "<option value=''>No hay Proyectos registrados</option>";
                        }

                    ?>
                </select>
            </div>

            <div class="lbl_donante">
                <label for="id_donante">Donante:</label>
                <select name="id_donante" id="id_donante">
                    <option value="">Selecciona un Donante</option>
                    <?php
                        include_once 'conexionDB.php';

                        $sqlDonante = "SELECT id_donante, nombre FROM DONANTE";
                        $resultDonante = $conn->query($sqlDonante);

                        if ($resultDonante->num_rows > 0) {
                            
                            while ($rowDonante = $resultDonante->fetch_assoc()) {
                                echo "<option value='" . $rowDonante['id_donante'] ."'>" . $rowDonante['nombre'] . "</option>";
                            }

                        } else {
                            echo "<option value=''>No hay Proyectos registrados</option>";
                        }

                    ?>
                </select>
            </div>
            
            <div class="btn_donacion">
                <button type="submit" id="btn_donar">Registrar Donación</button>
                <button type="button" id="btn_cancelar" onclick="cancelarDonacion()">Cancelar Donación</button>
            </div>
        </form>
    </div>

</body>
</html>
