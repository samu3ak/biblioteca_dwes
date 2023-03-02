<?php
session_start();
include './funciones.php';
include './conexion.php';
// Comprueba si está logueado
if (!isset($_SESSION["login"]) || !isset($_SESSION["admin"])) {
    print "<script>window.location='../login.php';</script>";
} else {
    // Recuperación de datos por POST
    $titulo = recoge("Titulo");
    $autor = recoge("Autor");
    $editorial = recoge("Editorial");
    $fecha = recoge("Fecha_publicacion");
    $genero = recoge("Genero");
    $precio = recoge("Precio");
    $descripcion = recoge("Descripción");
    // Comprueba que no haya campos vacíos
    if ($titulo != "" && $autor != "" && $editorial != "" && $fecha != "" && $genero != "" && $precio != "") {
        // Inserción
        $query = $db->query("INSERT INTO `libros` (`id`, `Titulo`, `Autor`, `Editorial`, `Fecha_publicacion`, `Genero`, `Precio`, `Imagen`, `Descripción`) 
    VALUES (NULL, '" . $titulo . "', '" . $autor . "', '" . $editorial . "', '" . $fecha . "', 
    '" . $genero . "', '" . $precio . "', '', '" . $descripcion . "')");
        header("Location:../agregarLibro.php?agregado=true");
    } else {
        // Si ha ocurrido un error recarga con un error la página redirigiendo
        header("Location:../agregarLibro.php?error=true");
    }
}
