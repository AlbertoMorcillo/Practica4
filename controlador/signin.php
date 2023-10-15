<?php
include_once '../modelo/Conection.php';

function entrarEnSignIn(){
    if (isset($_POST['signin'])) {
        header('Location: ../vista/signin_view.php');
        exit();
    } 
}

include_once '../vista/signin_view.php'
?>