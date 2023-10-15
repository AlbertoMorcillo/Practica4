<?php
//Created by: Alberto Morcillo

function validarEmailLogin($email, &$errors){
    validarEmailGeneral($email, $errors);
}

function validarPasswordLogin($password, &$errors){
    validarPasswordGeneral($password, $errors);
  
}

function validarEmailSignin($email, &$errors){
    validarEmailGeneral($email, $errors);
    
}

function validarPasswordSignin($password, &$errors){
    validarPasswordGeneral($password, $errors);
    
}

function validarEmailGeneral($email, &$errors){
    if (empty($email)) {
        $errors .= 'El email no puede estar vacío.<br>';
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors .= 'El email no es válido.<br>';
        }
    }
}

function validarPasswordGeneral($password, &$errors) {
    if (empty($password)){
        $errors .= 'La contraseña no puede estar vacía.<br>';
    } else {
        if (strlen($password) < 6) {
            $errors .= 'La contraseña debe tener al menos 6 caracteres.<br>';
        } else {
            if (!preg_match('`[a-z]`',$password)){
                $errors .= 'La contraseña debe tener al menos una letra minúscula.<br>';
            } else {
                if (!preg_match('`[A-Z]`',$password)){
                    $errors .= 'La contraseña debe tener al menos una letra mayúscula.<br>';
                } else {
                    if (!preg_match('`[0-9]`',$password)){
                        $errors .= 'La contraseña debe tener al menos un caracter numérico.<br>';
                    }
                }
            }
        }
    }
}
?>