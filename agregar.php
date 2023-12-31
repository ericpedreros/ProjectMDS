<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="./style.css">
    <title>Formulario</title>
</head>
<body>
    <center>
        <h1><b>Registrar Detencion</b></h1>
        <form method="post">
            <?php error_reporting(0); ?>
            <table>

                <tr>
                    <td>Rut Detenido:</td>
                    <td>
                        <input type="text" name="rut_detenido" value="" size="15" maxlength="8"> -
                        <input type="text" name="dig_det" value="" size="2" maxlength="1">
                    </td>
                </tr>
                <tr>
                    <td>Rut Empleado:</td>
                    <td>
                        <input type="text" name="rut_empleado" value="" size="15" maxlength="8"> -
                        <input type="text" name="dig_emp" value="" size="2" maxlength="1">
                    </td>
                </tr>
                <tr>
                    <td>Id Comisaria:</td>
                    <td>
                        <input type="text" name="id_com" value="" size="15" maxlength="30">
                    </td>
                </tr>
                <tr>
                    <td>Delito:</td>
                    <td>
                        <input type="text" name="delito" value="" size="15" maxlength="55">
                    </td>
                </tr>
                <tr>
                    <td>Fecha de Ingreso:</td>
                    <td>
                        <input type="datetime-local" name="fecha_ing" value="" size="15">
                    </td>
                </tr>
                <tr>
                    <td>Fecha de Egreso:</td>
                    <td>
                        <input type="datetime-local" name="fecha_egr" value="" size="15">
                    </td>
                </tr>
                
                <tr>
                    <td>Observacion:</td>
                    <td>
                        <input type="text" name="observacion" value="" size="15" maxlength="55">
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
            <br><br>
            <input type="submit" name="registro" value="Registrar">
        </form>

        <?php
            if (isset($_POST['registro'])) {
                include("conexion.php");
                $cnn = Conectar();
                $rutdet = $_POST['rut_detenido'] . "-" . $_POST['dig_det'];
                $rutemp = $_POST['rut_empleado'] . "-" . $_POST['dig_emp'];
                $id_com = $_POST['id_com'];
                $delito = $_POST['delito'];
                $fechai = $_POST['fecha_ing'];
                $fechae = $_POST['fecha_egr']; 
                $observ = $_POST['observacion'];
                $estado = $_POST['estado'];

                $sql = "INSERT INTO detenciones (RUT_DETENIDO, RUT_EMPLEADO, ID_COMISARIA, DELITO, FECHA_INGRESO, FECHA_EGRESO, OBSERVACION, ESTADO)
                    VALUES ('$rutdet', '$rutemp', '$id_com', '$delito', '$fechai', '$fechae', '$observ', '$estado')";

                if (mysqli_query($cnn, $sql)) {
                    echo "<script>alert('Se ha registrado exitosamente')</script>";
                } else {
                    echo "<script>alert('Error al registrar la cita')</script>";
                }
                mysqli_close($cnn);
            }
        ?>
        <br><br>
        <a href="admin.php">Volver</a>
    </center>
</body>
</html>