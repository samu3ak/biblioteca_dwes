<?php
session_start();
include './funciones.php';
include './conexion.php';
// Recoge del POST filtrando los datos
$nombre = recoge("nombre");
$password = recoge("password");
// Encripta la password
$password = md5($password);

// Realiza una query para buscar al usuario en la BBDD
$query = $db->query("SELECT * FROM usuario WHERE nombre = '" . $nombre . "' AND password = '" . $password . "'");
$row = $query->fetch_assoc();
if ($row == null) {
    // Si no se ha encontrado el usuario redirige con error
    header("Location:../login.php?errorLogin=true");
} else {
    // Comprueba si el usuario es administrador e inicializa la sesión admin para usarla en la página
    if ($row["nombre"] == "admin" && $row["password"] == md5("admin")) {
        $_SESSION["admin"] = true;
    }
    // Inicia las sesiones necesarias y redirige a la página principal
    $_SESSION["login"] = $row["id"];
    $_SESSION["correo"] = $row["correo"];
    header("Location:../index.php");
}
