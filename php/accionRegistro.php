<?php
session_start();
include './funciones.php';
include './conexion.php';
$nombre = recoge("nombre");
$password = recoge("password");
$password = md5($password);
$correo = recoge("correo");
$direccion = recoge("direccion");

if ($nombre != "" && $password != "" && $correo != "" && $direccion != "") {
    $query = $db->query("INSERT INTO `usuario` (`nombre`, `correo`, `password`, `fechaReg`, `direccion`, `id`) VALUES ('" . $nombre . "', '" . $correo . "'
, '" . $password . "', '', '" . $direccion . "', NULL)");
    header("Location:../register.php?registrado=true");
} else {
    header("Location:../register.php?errorRegistro=true");
}
