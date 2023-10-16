<?php
// Conection.php (Modelo)

try {
    // Establecer la conexión a la base de datos
    $connexio = new PDO('mysql:host=localhost;dbname=pt04_alberto_morcillo', 'root', '');

    // Establecer el modo de errores para PDO
    $connexio->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // Manejar errores de conexión
    echo "Error de conexión a la base de datos: " . $e->getMessage();
    die();
}

function obtenerTodosArticulos($connexio, $start, $cantidad_articulos_por_pagina){
    $statement = $connexio->prepare("SELECT * FROM articles LIMIT :start, :cantidad");
    $statement->bindParam(':start', $start, PDO::PARAM_INT);
    $statement->bindParam(':cantidad', $cantidad_articulos_por_pagina, PDO::PARAM_INT);
    $statement->execute();
    $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
}

function calcularTotalArticulos($connexio){
    $statement = $connexio->query('SELECT COUNT(*) FROM articles');
    $total_articulos = $statement->fetchColumn();
    return $total_articulos;
}

function calcularTotalPaginas($connexio, $cantidad_articulos_por_pagina){
    $total_articulos = calcularTotalArticulos($connexio);
    $numero_paginas = ceil($total_articulos / $cantidad_articulos_por_pagina);
    return $numero_paginas;
}

function comprobarUsuarioExistente($connexio, $email){
    $statement = $connexio->prepare("SELECT * FROM usuaris WHERE email = :email");
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();
    $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
}

function validarEmailExistente($email, $connexio) {
    $statement = $connexio->prepare('SELECT * FROM usuaris WHERE email = :email');
    $statement->execute(array(':email' => $email));

    return $statement->rowCount() > 0;
}

function insertarUsuario($email, $password, $connexio){
    $statement = $connexio->prepare('INSERT INTO usuaris (email, contrasena) VALUES (:email, :contrasena)');
    $statement->execute(array(':email' => $email, ':contrasena' => $password));
}

?>
