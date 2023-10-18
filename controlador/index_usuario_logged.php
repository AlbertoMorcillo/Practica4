<?php
// Iniciar la sesión
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['email'])) {
    // Si el usuario no está logueado, redirigirlo a la página de inicio de sesión
    header("Location: ./login.php");
    exit();
} else {
    include_once "./login.php";
    $_SESSION['email'] = $validEmail;
}

include_once '../vista/index_view_usuario_logged.php'

?>