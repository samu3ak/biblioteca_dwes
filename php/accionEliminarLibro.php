<?php
session_start();
include './funciones.php';
include './conexion.php';
if (!isset($_SESSION["login"]) || !isset($_SESSION["admin"])) {
    print "<script>window.location='../login.php';</script>";
} else {
    $id = recoge("id");


    $query = $db->query("DELETE FROM `libros` WHERE id='" . $id . "'");
    header("Location:../administrarLibros.php");
}
