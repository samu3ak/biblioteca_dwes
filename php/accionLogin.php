<?php
session_start();
include './funciones.php';
include './conexion.php';
$nombre = recoge("nombre");
$password = recoge("password");
$password = md5($password);

$query = $db->query("SELECT * FROM usuario WHERE nombre = '" . $nombre . "' AND password = '" . $password . "'");
$row = $query->fetch_assoc();
if ($row == null) {
    header("Location:../login.php?errorLogin=true");
} else {
    if ($row["nombre"] == "admin" && $row["password"] == md5("admin")) {
        $_SESSION["admin"] = true;
    }
    $_SESSION["login"] = $row["id"];
    header("Location:../index.php");
}
