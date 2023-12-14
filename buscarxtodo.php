<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="./style.css">
    <title>Listado de Citas</title>
</head>
<body>
    <form method = "post">
        <center><table border="1" bgcolor="#FFFFFF">
            <?php error_reporting(0); ?>
            <tr>
                <th>Id</th>
                <th>Rut Detenido</th>
                <th>Rut Empleado</th>
                <th>Id Comisaria</th>
                <th>Delito</th>
                <th>Fecha Ingreso</th>
                <th>Fecha Egreso</th>
                <th>Observacion</th>
                <th>Estado</th>
            </tr>

            <?php

                include("conexion.php"); 
                $cnn = Conectar();
                $sql = "SELECT * FROM detenciones";
                $result = mysqli_query($cnn, $sql);

            
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["0"] . "</td>";
                    echo "<td>" . $row["1"] . "</td>";
                    echo "<td>" . $row["2"] . "</td>";
                    echo "<td>" . $row["3"] . "</td>";
                    echo "<td>" . $row["4"] . "</td>";
                    echo "<td>" . $row["5"] . "</td>";
                    echo "<td>" . $row["6"] . "</td>";
                    echo "<td>" . $row["7"] . "</td>";
                    echo "<td>" . $row["8"] . "</td>";

                    echo "</tr>";
                }
            
                mysqli_close($cnn);
            ?>
        
        </table></center>
        <br></br>
            <center><a href = "buscar.php">Volver</a></center>
</body>
</html>