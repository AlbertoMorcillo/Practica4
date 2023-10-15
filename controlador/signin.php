<?php
//Created by: Alberto Morcillo

$errors ='';
$insertadoCorrectamente = '';

$validEmail = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$validPassword = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    include_once './validaciones.php';

    validarEmailSignin($validEmail, $errors);
    validarPasswordSignin($validPassword, $errors);

}





function entrarEnSignIn(){
    if (isset($_POST['signin'])) {
        header('Location: ../vista/signin_view.php');
        exit();
    } 
}

include_once '../vista/signin_view.php'
?>