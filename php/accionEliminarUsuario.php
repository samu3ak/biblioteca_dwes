<?php
session_start();
include './funciones.php';
include './conexion.php';
// Comprueba si está logueado
if (!isset($_SESSION["login"]) || !isset($_SESSION["admin"])) {
    print "<script>window.location='../login.php';</script>";
} else {
    // Recoge la id del usuario a borrar
    $id = recoge("id");

    // Lo borra de la BBDD y redirige al panel de administración de usuarios
    $query = $db->query("DELETE FROM `usuario` WHERE id='" . $id . "'");
    header("Location:../administrarUsuarios.php");
}
