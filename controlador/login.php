<?php
//Created by: Alberto Morcillo

$errors ='';
$emailOK = false;

// Variables para almacenar valores válidos
$validEmail = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$validPassword = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    include_once './validaciones.php';

    validarEmailLogin($validEmail, $errors);
    validarPasswordLogin($validPassword, $errors);

    if (empty($errors)){
        require_once '../modelo/Conection.php';

        if (!validarEmailExistente($validEmail, $connexio)){
            $errors .= "No estas registrado.<br>";
        }
        else {
            $emailOK = true;
        }

        if ($emailOK = true){
            session_start();
            $_SESSION['email'] = $validEmail;
            header("Location: ./index_usuario_logged.php");
            exit();
        } else {
            $erros .= "Hubo un error en el loggin. Por favor, intenta nuevamente.";
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
