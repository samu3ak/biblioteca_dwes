<?php
session_start();
include './funciones.php';
include './conexion.php';
$busqueda = recoge("busqueda");
$filtrado = recoge("filtrado");

if ($busqueda != "" && $filtrado != "") {
    header("Location:../librosEncontrados.php?filtrado=" . $filtrado . "&busqueda=" . $busqueda);
} else {
    header("Location:../buscarLibro.php?error=true");
}
