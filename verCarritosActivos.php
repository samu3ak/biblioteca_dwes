<?php
session_start();
include './php/funciones.php';
include './php/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Biblioteca</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
    <main class="mb-5">
        <?php if (isset($_SESSION["admin"])) { ?>
            <div class="container-fluid mt-5 mb-5">
                <div class="row m-5">
                    <div class="col-12 text-center mb-5">
                        <h1>Ver Carritos Activos</h1>
                    </div>
                    <div class="col-12 p-3 rounded text-center bg-primary text-white">
                        <div class="row justify-content-center">
                            <div class="col-4">
                                Correo dueño carrito
                            </div>
                            <div class="col-4">
                                Fecha procesado de carrito
                            </div>
                            <div class="col-4">
                                Id del carrito
                            </div>
                        </div>
                    </div>
                    <?php
                    $query = "SELECT * FROM carrito";
                    $resultado = mysqli_query($db, $query);
                    if (mysqli_num_rows($resultado) > 0) {
                        while ($row = mysqli_fetch_assoc($resultado)) {
                    ?>
                            <div class="col-12 p-3 mt-5 rounded text-center bg-primary text-white">
                                <div class="row justify-content-center">
                                    <div class="col-4">
                                        <?php
                                        print($row["client_email"]);
                                        ?>
                                    </div>
                                    <div class="col-4">
                                        <?php
                                        print($row["created_at"]);
                                        ?>
                                    </div>
                                    <div class="col-4">
                                        <?php
                                        print($row["id"]);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <a class="btn col-12 bg-primary mt-3 rounded text-white">
                            <div class="row">
                                <div class="col-12">No hay carritos disponibles</div>
                            </div>
                        </a>
                    <?php
                    }
                    ?>

                </div>
            </div><?php } else { ?>
            <div class="col-12 text-center mt-5">
                <h1>No tiene permisos para ver esto</h1>
            </div>
        <?php } ?>
    </main>
    <footer class="text-center text-white mt-5 fixed-bottom bg-primary">
        <div class="text-center p-3">
            <a class="text-white">© 2023 Copyright: Libros Paco</a>
        </div>
    </footer>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>