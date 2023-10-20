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

function validarPasswordRepetida($password, &$errors, $passwordRepetida){
    if(empty($passwordRepetida)){
        $errors .= 'El campo de repetir contraseña no puede estar vacío.<br>';
    }
    else{
        if($passwordRepetida != $password){
            $errors .= 'Las contraseñas no coinciden.<br>';
        }
    }
}

function validarArticulo($articuloInsertado, &$errors){
    if(empty($articuloInsertado)){
        $errors .= 'El campo de escribir articulo no puede estar vacío a la hora de añadirlo.<br>';
    }
}

function validarArticuloBorrar($articuloBorrado, &$errors){
    if(empty($articuloBorrado)){
        $errors .= 'El campo de decir que articulo quieres borrar no puede estar vacío si quiere eliminarlo.<br>';
    }
    elseif(!preg_match('/^[0-9]+$/', $articuloBorrado)){
        $errors .= 'Solo puedes ingresar números en el campo de artículo a borrar.<br>';
    }
    else{
        $article_id = intval($articuloBorrado);
        return $article_id;
    }
}
?>