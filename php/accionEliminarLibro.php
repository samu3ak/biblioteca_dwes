<?php
session_start();
include './funciones.php';
include './conexion.php';
$id = recoge("id");


$query = $db->query("DELETE FROM `libros` WHERE id='" . $id . "'");
header("Location:../administrarLibros.php");
