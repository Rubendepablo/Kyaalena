<?php
// Iniciamos sesion para poder seguir con el usuario logeado con anterioridad
session_start();
// Destruimos la variable que contiene la id del usuario logeado
unset($_SESSION["usuario"]);
// Redirigimos con el header a la página del "login.php"
header("Location:tienda.php");
?>