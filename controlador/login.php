<?php
//Created by: Alberto Morcillo

$errors ='';
$insertadoCorrectamente = '';

// Variables para almacenar valores válidos
$validEmail = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$validPassword = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    include_once './validaciones.php';

    validarEmail($validEmail, $errors);
    validarPassword($validPassword, $errors);

    if (empty($errors)){
        include_once '../modelo/Conection.php';

        if (!validarEmailExistente($validEmail, $connexio)){
            $errors .= "No estas registrado.<br>";
        }
    }
}

function entrarEnLogin(){
    if (isset($_POST['login'])) {
        header('Location: ../vista/login_view.php');
        exit();
    } 
}

function login(){

}

include_once '../vista/login_view.php'
?>
