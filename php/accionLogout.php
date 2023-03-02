<?php
session_start();
// Destruye la sesión y redirige a la página principal
session_destroy();
header("Location:../index.php");
