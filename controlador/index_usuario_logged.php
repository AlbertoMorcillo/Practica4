<?php
// Iniciar la sesión
session_start();

// Verificar si el usuario está logueado
// if (!isset($_SESSION['email'])) {
//     // Si el usuario no está logueado, redirigirlo a la página de inicio de sesión
//     header("Location: ./login.php");
//     exit();
// } else {
//     include_once "./login.php";
//     $_SESSION['email'] = $validEmail;
// }


require_once '../modelo/Conection.php';


function mostrarArticulos($connexio, $start, $cantidad_articulos_por_pagina){
    $resultados = obtenerTodosArticulos($connexio, $start, $cantidad_articulos_por_pagina);
    $listaArticulos = '';
    foreach ($resultados as $articulo) {
        $listaArticulos .= '<li>' . $articulo['article_id'] . ' - ' . $articulo['article'] . '</li>';
    }
    return $listaArticulos;
}

function elegirCantidadArticulosPorPagina(){
    if (isset($_POST['cantidadArticulosPorPagina'])) {
        $cantidad_articulos_por_pagina = $_POST['cantidadArticulosPorPagina'];
    } else {
        $cantidad_articulos_por_pagina = 5;
    }
    return $cantidad_articulos_por_pagina;
}

function obtenerDatosPaginacion($connexio) {
    $cantidad_articulos_por_pagina = elegirCantidadArticulosPorPagina();
    $numero_paginas = calcularTotalPaginas($connexio, $cantidad_articulos_por_pagina);
    return array(
        'cantidad_articulos_por_pagina' => $cantidad_articulos_por_pagina,
        'numero_paginas' => $numero_paginas
    );
}

$pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$cantidad_articulos_por_pagina = elegirCantidadArticulosPorPagina();
$start = ($pagina_actual - 1) * $cantidad_articulos_por_pagina;

$datos_paginacion = obtenerDatosPaginacion($connexio);
$cantidad_articulos_por_pagina = $datos_paginacion['cantidad_articulos_por_pagina'];
$numero_paginas = $datos_paginacion['numero_paginas'];

$articulos = mostrarArticulos($connexio, $start, $cantidad_articulos_por_pagina);

// Pasa las variables a la vista


include_once '../vista/index_view_usuario_logged.php'

?>