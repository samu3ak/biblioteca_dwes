<?php
session_start();
include './funciones.php';
include './conexion.php';
// Recupera los datos del POST y filtra con la función
$nombre = recoge("nombre");
$password = recoge("password");
// Encripta mediante MD5
$password = md5($password);
$correo = recoge("correo");
$direccion = recoge("direccion");

// Busca si existe un usuario con el mismo nombre ya en la BBDD
$result = mysqli_query($db, "SELECT * FROM usuario WHERE nombre = '" . $nombre . "'");
$row = $result->fetch_assoc();

// Comprueba que no existe usuario con el mismo nombre y campos rellenados
if ($row == null && $nombre != "" && $password != "" && $correo != "" && $direccion != "") {
    $query = $db->query("INSERT INTO `usuario` (`nombre`, `correo`, `password`, `fechaReg`, `direccion`, `id`) VALUES ('" . $nombre . "', '" . $correo . "'
, '" . $password . "', NOW(),'" . $direccion . "', NULL)");
    // Redirige con mensaje de éxito en el registro
    header("Location:../register.php?registrado=true");
} else {
    // Manda diferentes errores dependiendo de si no ha rellenado los campos o el usuario ya existe
    if ($nombre == "" || $password == "" || $correo == "" || $direccion == "") {
        $errorRegistro = "No ha introducido los datos correctamente";
    } else {
        $errorRegistro = "Ya existe un usuario con ese nombre, por favor, elija otro nombre";
    }
    header("Location:../register.php?errorRegistro=" . $errorRegistro);
}
