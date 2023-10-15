<?php
//Created by: Alberto Morcillo

function validarEmail($email, &$errors){
    if (empty($email)) {
        $errors .= 'El email no puede estar vacío.<br>';
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors .= 'El email no es válido.<br>';
        }
    }
}

function validarPassword($password, &$errors){
    if (empty($password)){
        $errors .= 'La contraseña no puede estar vació.<br>';
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