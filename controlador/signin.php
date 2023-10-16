<?php
// Created by: Alberto Morcillo

$errors = '';
$insertadoCorrectamente = '';

$validEmail = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$validPassword = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';
$validPasswordRepetida = isset($_POST['passwordRepetida']) ? htmlspecialchars($_POST['passwordRepetida']) : '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once './validaciones.php';

    validarEmailSignin($validEmail, $errors);
    validarPasswordSignin($validPassword, $errors);
    validarPasswordRepetida($validPassword, $errors, $validPasswordRepetida);

    if (empty($errors)) {
        include_once '../modelo/Conection.php';

        if (validarEmailExistente($validEmail, $connexio)) {
            $errors .= "Ya estás registrado. Por favor, inicia sesión.";
            header("Location: ../vista/signin_view.php?error=$errors");
            exit();
        } else {
            $insertadoCorrectamente = insertarUsuario($validEmail, $validPassword, $connexio);

            if ($insertadoCorrectamente) {
                header("Location: ../vista/index_view_usuario_logged.php");
                exit();
            } else {
                $errors .= "Hubo un error al registrar el usuario. Por favor, intenta nuevamente.";
                header("Location: ../vista/signin_view.php?error=$errors");
                exit();
            }
        }
    }
}


include_once '../vista/signin_view.php';
?>
