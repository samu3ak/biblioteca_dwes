<?php
session_start();
include './funciones.php';
include './conexion.php';
$nombre = recoge("nombre");
$password = recoge("password");
$password = md5($password);
$correo = recoge("correo");
$direccion = recoge("direccion");

$result = mysqli_query($db, "SELECT * FROM usuario WHERE nombre = '" . $nombre . "'");
$row = $result->fetch_assoc();

if ($row == null && $nombre != "" && $password != "" && $correo != "" && $direccion != "") {
    $query = $db->query("INSERT INTO `usuario` (`nombre`, `correo`, `password`, `fechaReg`, `direccion`, `id`) VALUES ('" . $nombre . "', '" . $correo . "'
, '" . $password . "', NOW(),'" . $direccion . "', NULL)");
    header("Location:../register.php?registrado=true");
} else {
    if ($nombre == "" || $password == "" || $correo == "" || $direccion == "") {
        $errorRegistro = "No ha introducido los datos correctamente";
    } else {
        $errorRegistro = "Ya existe un usuario con ese nombre, por favor, elija otro nombre";
    }
    header("Location:../register.php?errorRegistro=" . $errorRegistro);
}
