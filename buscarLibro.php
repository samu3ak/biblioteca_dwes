<?php
session_start();
include './php/funciones.php';
include './php/conexion.php';
$error = recoge("error");
$agregado = recoge("agregado");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Biblioteca</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body>
<nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="/">Bibliotecas Paco González</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" data-toggle="tooltip" data-placement="bottom" title="Inicio" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" data-toggle="tooltip" data-placement="bottom" title="Inicio" href="./buscarLibro.php">Buscar Libro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" data-toggle="tooltip" data-placement="bottom" title="Inicio" href="index.php">Listar Libros</a>
                    </li>
                    <?php
                    if (isset($_SESSION["admin"])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link text-dark" data-toggle="tooltip" data-placement="bottom" title="Inicio" href="./administrarLibros.php">Adminisitrar Libros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" data-toggle="tooltip" data-placement="bottom" title="Inicio" href="./administrarUsuarios.php">Adminisitrar Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" data-toggle="tooltip" data-placement="bottom" title="Inicio" href="./verCarritosActivos.php">Ver Carritos Activos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" data-toggle="tooltip" data-placement="bottom" title="Inicio" href="./verPedidos.php">Ver Pedidos</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <form class="gap-5">
                <?php
                if (isset($_SESSION["login"])) {
                ?>
                    <a class="btn btn-outline-light btn-warning" href="./carrito.php">Ver Carrito</a>
                    <a class="btn btn-outline-light btn-danger" href="./php/accionLogout.php">Cerrar Sesión</a>
                <?php
                } else {
                ?>
                    <a class="btn btn-outline-light btn-success" href="./login.php">Iniciar Sesión</a>
                    <a class="btn btn-outline-light" href="./register.php">Registrarse</a>
                <?php
                }
                ?>
            </form>
        </div>
    </nav>
    <main>
        <div class="container-fluid mt-5 mb-5">
            <div class="row justify-content-center">
                <form action="./php/accionBusqueda.php" class="rounded bg-primary p-4 mb-5 text-white align-self-center" method="POST">
                    <div class="mt-2 text-center">
                        <h1 class="display-6">Buscar Libro Por</h1>
                    </div>
                    <div class="mb-3 pt-4 ps-5 pe-5">
                        <label for="username" class="form-label">Buscar por</label>
                        <select class="form-select" name="filtrado">
                            <option value="Titulo">Titulo</option>
                            <option value="Autor">Autor</option>
                            <option value="Editorial">Editorial</option>
                            <option value="Genero">Genero</option>
                        </select>
                    </div>
                    <div class="mb-3 pt-4 ps-5 pe-5">
                        <label for="username" class="form-label">Buscar</label>
                        <input type="text" class="form-control" id="username" placeholder="Introduce tu búsqueda" name="busqueda">
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-6 text-center">
                            <button type="submit" class="btn btn-success mt-5 buttonFormat">Realizar Búsqueda</button>
                        </div>
                        <?php
                        if ($error) {
                        ?>
                            <p class="text-center mt-3 p-1 bg-danger">Rellena correctamente los campos solicitados</p>
                        <?php
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer class="text-center text-white fixed-bottom bg-primary">
        <div class="text-center p-3">
            <a class="text-white">© 2023 Copyright: Libros Paco</a>
        </div>
    </footer>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>