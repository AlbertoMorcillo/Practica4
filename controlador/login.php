<?php
//Created by: Alberto Morcillo

$errors ='';
$insertadoCorrectamente = '';

// Variables para almacenar valores válidos
$validEmail = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$validPassword = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    include_once './validaciones.php';

    validarEmailLogin($validEmail, $errors);
    validarPasswordLogin($validPassword, $errors);

    if (empty($errors)){
        include_once '../modelo/Conection.php';

        if (!validarEmailExistente($validEmail, $connexio)){
            $errors .= "No estas registrado.<br>";
            header("Location: ../vista/login_view.php?error=$errors");
            exit();
        }
        else {

            //ToDo: Hacer que si esta todo ok y registrado tambien que inicie sesión y le envie al login que solo los usuarios registrados puede ver,modificar,insertar,borrar,etc.
        }
    } 
}

function entrarEnLogin(){
    if (isset($_POST['login'])) {
        header('Location: ../vista/login_view.php');
        exit();
    } 
}


include_once '../vista/login_view.php'
?>
