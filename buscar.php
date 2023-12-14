<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="./style.css">
    <title>Admin</title>
    <script>
        function redirectToPage(pageName) {
            window.location.href = pageName;
        }
    </script>
</head>
    <body>
    
    <div class="input-field button">

        <input type="button" onclick="redirectToPage('buscarxtodo.php')" value="Mostrar a Todos" />

        <input type="button" onclick="redirectToPage('buscarxrut.php')" value="Buscar x Rut" />
                            
        <input type="button" onclick="redirectToPage('buscarxid.php')" value="Buscar x Id" />

        <br></br>

        <center>
            <a href="admin.php">Volver</a>
        </center>

    </div>
    </body>
</html>
