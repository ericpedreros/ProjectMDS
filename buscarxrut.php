<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar x Rut</title>
</head>
<body>
    
</body>
</html>
        <form method = "post">
        <center><table border="1">
            <?php error_reporting(0); ?>
            
            <tr>
                <td>Rut Empleado:</td>
                <td>
                    <input type = "text"    name = "rut_empleado"   value = ""  size = "15"   maxlength = "13">
                </td>
            </tr>

            <br></br>

            <tr>
                <td>Rut Estudiante:</td> 
                <td>
                    <input type = "text"    name = "rut_estud"   value = ""  size = "15"   maxlength = "13">
                </td>
            </tr>
            
            <br></br>

            <tr>
                    <td><input type="submit" name="search" value="buscar"></td>
            </tr>
           
            
            <tr>
                <th>Id</th>
                <th>Rut Empleado</th>
                <th>Rut Estudiante</th>
                <th>Num Aula</th>
                <th>Motivo</th>
                <th>Fecha Registro</th>
                <th>Fecha Acordada</th>
                <th>Estado</th>
                <th>Observacion</th>
                <th>Acuerdos</th>

            </tr>

            <?php


                if ($_POST['search'] == "buscar"){
                    include("conexion.php"); 
                    $cnn = Conectar();
                    $rutemp = $_POST['rut_empleado'];
                    $rutest = $_POST['rut_estud'];

                    $sql = "SELECT *
                    FROM cita
                    WHERE (RUT_EMPLEADO = '$rutemp' OR RUT_ESTUD = '$rutest')";
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
                            echo "<td>" . $row["9"] . "</td>";

                            echo "</tr>";
                        }
                }
            
                mysqli_close($cnn);
            ?>
        
        </table></center>
        <br></br>
            <center><a href = "buscar.php">Volver</a></center>