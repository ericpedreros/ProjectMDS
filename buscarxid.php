<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form method = "post">
        <center><table border="1">
            <?php error_reporting(0); ?>
            
            <tr>
                <td>Id:</td>
                <td>
                    <input type = "text"    name = "id"   value = ""  size = "15"   maxlength = "13">
                </td>
            </tr>

            <br></br>

            <tr>
                    <td><input type="submit" name="search" value="buscar"></td>
            </tr>
           

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


                if ($_POST['search'] == "buscar"){
                    include("conexion.php"); 
                    $cnn = Conectar();
                    $id = $_POST['id'];
                

                    $sql = "SELECT *
                    FROM detenciones
                    WHERE ID = '$id'";
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
                }
            
                mysqli_close($cnn);
            ?>
        
        </table></center>
        <br></br>
            <center><a href = "buscar.php">Volver</a></center>
    </body>
</html>