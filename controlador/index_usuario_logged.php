<?php
// Iniciar la sesión
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['email'])) {
    // Si el usuario no está logueado, redirigirlo a la página de inicio de sesión
    header("Location: ./login.php");
    exit();
}

?>