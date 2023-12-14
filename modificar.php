<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="./style.css">
    <title>Modificar</title>
</head>
<body>
    <center>
        <h1><b>FORMULARIO</b></h1>
        <form method="post">
            <?php error_reporting(0); ?>
            <table border="1" bgcolor="#FFFFFF">
                <tr>
                    <td>Rut Detenido:</td>
                    <td>
                        <input type="text" name="rut_det" value="" size="15" maxlength="13">
                    </td>
                </tr>
                <tr>
                    <td>Rut Empleado:</td>
                    <td>
                        <input type="text" name="rut_empleado" value="" size="15" maxlength="13">
                    </td>
                </tr>
                
                <tr>
                    <td>Id:</td>
                    <td>
                        <input type = "text"    name = "id"   value = ""  size = "15"   maxlength = "13">
                    </td>
                </tr>
                
            </table>
            <br>
            <input type="submit" name="search" value="Buscar">
            <br><br>
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['search'])) {
                    include("conexion.php");
                    $cnn = Conectar();
                    $rutdet = $_POST['rut_det'];
                    $rutemp = $_POST['rut_empleado'];

                    $sql = "SELECT *
                    FROM detenciones 
                    WHERE (RUT_DETENIDO = '$rutdet' OR RUT_EMPLEADO = '$rutemp')
                    GROUP BY ID";
                    $result = mysqli_query($cnn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        echo "<table border='1' bgcolor='#FFFFFF'>
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
                            </tr>";

                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["ID"] . "</td>";
                            echo "<td>" . $row["RUT_DETENIDO"] . "</td>";
                            echo "<td>" . $row["RUT_EMPLEADO"] . "</td>";
                            echo "<td>" . $row["ID_COMISARIA"] . "</td>";
                            echo "<td>" . $row["DELITO"] . "</td>";
                            echo "<td>" . $row["FECHA_INGRESO"] . "</td>";
                            echo "<td>" . $row["FECHA_EGRESO"] . "</td>";
                            echo "<td>" . $row["OBSERVACION"] . "</td>"; 
                            echo "<td>" . $row["ESTADO"] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "No se encontraron resultados.";
                    }
                    mysqli_close($cnn);
                }
            }
            ?>
            <br><br>
            <table border="1" bgcolor="#FFFFFF">
                <tr>
                    <td>Delito:</td>
                    <td>
                        <input type="text" name="delito" value="" size="15" maxlength="55">
                    </td>
                </tr>

                <tr>
                    <td>Fecha Egreso:</td>
                    <td>
                        <input type="datetime-local" name="fecha_egreso" value="" size="15">
                    </td>
                </tr>

                <tr>
                    <td>Observación:</td>
                    <td>
                        <input type="text" name="observacion" value="" size="15" maxlength="40">
                    </td>
                </tr>

                <tr>
                    <td>Estado:</td>
                    <td>
                        <select name = "estado">
                        <option value = "Activo" selected = ""> Activo </option>
                        <option value = "Terminado"> Terminado </option>
                        <option value = "Espera" > Espera </option>
                    </select>
                    </td>
                </tr>

            </table>
            <br></br>
            <input type="submit" name="modificar" value="Modificar">
            <br><br>
            <?php
            if (isset($_POST['modificar'])) {
                include("conexion.php");
                $cnn = Conectar();
                $rutdet = $_POST['rut_det'];                
                $rutemp = $_POST['rut_empleado'];
                $id =  $_POST['id'];
                $delito = $_POST['delito'];
                $fechae = $_POST['fecha_egreso'];
                $observ = $_POST['observacion'];
                $estado = $_POST['estado'];

                $sql = "UPDATE detenciones
                        SET DELITO = '$delito',
                            FECHA_EGRESO = '$fechae',
                            OBSERVACION = '$observ',
                            ESTADO = '$estado'
                        WHERE (RUT_DETENIDO = '$rutdet' OR RUT_EMPLEADO = '$rutemp') AND ID = '$id'";

                if (mysqli_query($cnn, $sql)) {
                    echo "<script> alert('Se ha modificado exitosamente')</script>";
                } else {
                    echo "<script> alert('Error al modificar la detencion')</script>";
                }

                mysqli_close($cnn);
            }
            ?>
            <br><br>
            <a href="admin.php">Volver</a>
        </form>
    </center>
</body>
</html>