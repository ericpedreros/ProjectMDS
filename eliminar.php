<html>
    <head>
        <title>Formulario</title>
    </head>
    <body bgcolor = "#FFFFFF">
        <center><h1>Eliminar x Rut</h1></center>
        <form method = "post">
        <?php error_reporting(0); ?>
        <center><table border="1">

            <tr>
                <td>Rut Detenido:</td>
                <td>
                    <input type="text" name="rut_detenido" value="" size="15" maxlength="13">
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
                    <input type = "text"    name = "id"   value = ""  size = "15"   maxlength = "3">
                </td>
            </tr>
           
            <br></br>

            <tr>
                <td><input type="submit" name="search" value="buscar"></td>
            </tr>

            <tr>
                <th>ID</th>
                <th>RUT_DETENIDO</th>
                <th>RUT_EMPLEADO</th>
                <th>ID_COMISARIA</th>
                <th>DELITO</th>
                <th>FECHA_INGRESO</th>
                <th>FECHA_EGRESO</th>
                <th>OBSERVACION</th>
                <th>ESTADO</th>
            </tr>

            <?php

                    if (isset($_POST['search']) && $_POST['search'] == "buscar") {
                    include("conexion.php");
                    $cnn = Conectar();
                    $rutdet = $_POST['rut_detenido'];
                    $rutemp = $_POST['rut_empleado'];
                        $sql= "SELECT * 
                        FROM detenciones 
                        WHERE (RUT_DETENIDO = '$rutdet' OR RUT_EMPLEADO = '$rutemp')";
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
            
            ?>  

        </table>
            <br></br>
            <tr>
                <td>
                    <input type = "submit" name = "delete"  value = "Eliminar">
                </td>
            </tr>
            
            
            <br></br>
        </form>

        <?php

            if (isset($_POST['delete']) && $_POST['delete'] == "Eliminar"){
                include("conexion.php");
                $cnn = Conectar();
                $rutdet = $_POST['rut_detenido'];
                $rutemp = $_POST['rut_empleado'];
                $id =  $_POST['id'];

                $sql = "DELETE 
                FROM detenciones 
                WHERE (RUT_DETENIDO = '$rutdet' OR RUT_EMPLEADO = '$rutemp') AND ID = '$id'";
                echo $sql;
                mysqli_query($cnn, $sql);
                echo "<script> alert('Se ha borrado exitosamente')</script>";
            }
        ?>
            <br></br>
            <a href = "index.html">Volver</a>
    </body></center>
</html>