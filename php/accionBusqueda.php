<?php
session_start();
include './funciones.php';
include './conexion.php';
// Recuperación de criterios de búsqueda
$busqueda = recoge("busqueda");
$filtrado = recoge("filtrado");

if ($busqueda != "" && $filtrado != "") {
    // Redirige con los criterios seleccionados para realizar la query
    header("Location:../librosEncontrados.php?filtrado=" . $filtrado . "&busqueda=" . $busqueda);
} else {
    // Error por no rellenar bien los campos
    header("Location:../buscarLibro.php?error=true");
}
