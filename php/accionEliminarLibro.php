<?php
session_start();
include './funciones.php';
include './conexion.php';
// Comprueba que está logueado
if (!isset($_SESSION["login"]) || !isset($_SESSION["admin"])) {
    print "<script>window.location='../login.php';</script>";
} else {
    // Usa la id del libro a borrar
    $id = recoge("id");

    // Lo borra de la BBDD y redirige 
    $query = $db->query("DELETE FROM `libros` WHERE id='" . $id . "'");
    header("Location:../administrarLibros.php");
}
