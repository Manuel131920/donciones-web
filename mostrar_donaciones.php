<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    <title>Registro de Donaciones</title>

    <style>
        body {
            background-color: #333446;
            box-sizing: border-box;
            color: whitesmoke;
            font-family: "Lexend Deca", sans-serif;
        }

        h1 {
            color: #578FCA;
            font-size: 2.5em;
            text-align: center;
            
        }

        h2 {
            color: #E3DE61;
            text-align: center;
        }

        h3 {
            color: #7F8CAA;
            text-align: center;
        }

        h1, h2, h3 {
            text-transform: uppercase;
        }

        .container {
            background-color: #DDDDDD;
            border: 3px solid #DDF6D2;
            border-radius: 15px;
            color: #333446;
            padding: 20px;
            margin-left: auto;
            margin-right: auto;
            width: 70%;
        }


        table {
            border-collapse: collapse;
            border: 3px solid #333446;
            border-radius: 15px;
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #4DA8DA;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #686D76;
            color: whitesmoke;
        }
    </style>

</head>
<body>

    <h1>Organización sin fines de lucro</h1>
    <h2>Registro de Donaciones</h2>
    <div class="container">
        <?php

            include 'conexionDB.php';

            $sql = "SELECT d.id_donacion, d.monto, d.fecha, p.nombre AS nombre_proyecto, don.nombre AS nombre_donante
                    FROM DONACION d
                    JOIN PROYECTO p ON d.id_proyecto = p.id_proyecto
                    JOIN DONANTE don ON d.id_donante = don.id_donante";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<h3>Donaciones</h3>";
                echo "<table border='1'>";
                echo "<tr><th>ID Donación</th><th>Monto</th><th>Fecha</th><th>Proyecto</th><th>Donante</th></tr>";

                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id_donacion"] . "</td>";
                    echo "<td>" . $row["monto"] . "</td>";
                    echo "<td>" . $row["fecha"] . "</td>";
                    echo "<td>" . $row["nombre_proyecto"] . "</td>";
                    echo "<td>" . $row["nombre_donante"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                
            } else {
                echo "No se encontraron donaciones.";
            }

            $conn->close();
        ?>
    </div>
    
</body>
</html>