<?php
session_start();
unset($_SESSION["permiso"]);
session_destroy();
header("Location:index.php");
?>