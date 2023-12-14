<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel='stylesheet' href="./style.css">
    </head>
    <body>
        <div class="container">
            <header>Inicio de sesion</header>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="text">
                    <div class="input-field">
                        <input type="text" name="txtrut" placeholder="ingresa tu Rut" class="text" />
                    </div>
                    <div class="field create-password">
                        <div class="input-field">
                            <input type="password" name="password" placeholder="Ingresa tu contraseña" class="password" />
                            <i class="bx bx-hide show-hide"></i>
                        </div>
                        <div class="input-field button">
                            <input type="submit" name="sesion" value="Iniciar Sesion" />
                        </div>
                    </div>
                </div>
            </form>

        <?php
        if (isset($_POST['sesion'])) {
            include("conexion.php"); 
            $cnn = Conectar();
            $rut = $_POST['txtrut'];
            $pass = $_POST['password']; 

            $sql_empleado = "SELECT RUT, NOMBRES, APELLIDOS, ID_CARGO FROM empleados WHERE RUT = '$rut' AND CONTRASEÑA = '$pass'";
            $rs_empleado = mysqli_query($cnn, $sql_empleado);

            if (mysqli_num_rows($rs_empleado) != 0) {
                $row_empleado = mysqli_fetch_array($rs_empleado);
                $id_cargo = $row_empleado['ID_CARGO'];

                $sql_cargo = "SELECT ID_PERMISO FROM cargo WHERE ID = $id_cargo";
                $rs_cargo = mysqli_query($cnn, $sql_cargo);

                if (mysqli_num_rows($rs_cargo) != 0) {
                    $row_cargo = mysqli_fetch_array($rs_cargo);

                    $_SESSION['rut'] = $row_empleado['RUT'];
                    $_SESSION['name'] = $row_empleado['NOMBRES'];
                    $_SESSION['ap'] = $row_empleado['APELLIDOS'];
                    $_SESSION['permiso'] = $row_cargo['ID_PERMISO'];

                    switch ($_SESSION['permiso']) {
                        case 1:
                            echo "<script>alert('Bienvenido " . $_SESSION['name'] . " " . $_SESSION['ap'] . "')</script>";
                            echo "<script type='text/javascript'>window.location='admin.php'</script>";
                            break;
                        case 2:
                            echo "<script>alert('Bienvenido " . $_SESSION['name'] . " " . $_SESSION['ap'] . "')</script>";
                            echo "<script type='text/javascript'>window.location='esclavo.php'</script>";
                            break;
                        default:
                            echo "Permiso no valido";
                    }
                } else {
                    echo "Error en la consulta de cargo: " . mysqli_error($cnn);
                }
            } else {
                echo "Usuario y/o contraseña incorrectos";
            }

            mysqli_close($cnn);
        }
        ?>
    </body>
</html>
