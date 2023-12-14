<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel='stylesheet' href="./style.css">
    <script>
        function redirectToPage(pageName) {
            window.location.href = pageName;
        }
    </script>
</head>
<body>
 
    <div class="input-field button">
        <input type="button" onclick="redirectToPage('agregar.php')" value="AGREGAR" />

        <input type="button" onclick="redirectToPage('eliminar.php')" value="ELIMINAR" />
                            
        <input type="button" onclick="redirectToPage('modificar.php')" value="MODIFICAR" />

        <input type="button" onclick="redirectToPage('buscar.php')" value="BUSCAR" />
    </div>
     
</body>
</html>