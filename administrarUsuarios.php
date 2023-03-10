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
            <a class="navbar-brand text-white">Bibliotecas Paco González</a>
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
                    // Si es admin
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
                // Comprueba que esté logueado
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
        <!-- Comprueba que sea admin, ya que es una fucionalidad sólo para administradores de la aplicación -->
        <?php if (isset($_SESSION["admin"])) { ?>
            <div class="container-fluid mt-5 mb-5">
                <div class="row m-5">
                    <div class="col-12 text-center mb-5">
                        <h1>Adminisitrar Usuarios</h1>
                    </div>
                    <div class="col-12 p-3 rounded text-center bg-primary text-white">
                        <div class="row">
                            <div class="col-3">
                                Nombre
                            </div>
                            <div class="col-3">
                                Correo
                            </div>
                            <div class="col-3">
                                Fecha Registro
                            </div>
                            <div class="col-3">
                                Dirección
                            </div>
                        </div>
                    </div>

                    <?php
                    $hayUsuarios = false;
                    // Recupera todos los usuarios de la base de datos
                    $query = "SELECT * FROM usuario";
                    $resultado = mysqli_query($db, $query);
                    if (mysqli_num_rows($resultado) > 0) {
                        while ($row = mysqli_fetch_assoc($resultado)) {
                            // Por cada resultado de usuario lo pinta con el siguiente formato, obviando el usuario administrador
                            if ($row["nombre"] != "admin") {
                                // Si entra en la condición, ha encontrado usuarios, se cambia el booleano a true
                                $hayUsuarios = true;
                    ?>
                                <div class="col-12 p-3 mt-5 rounded text-center bg-primary text-white">
                                    <div class="row">
                                        <div class="col-3">
                                            <?php
                                            print($row["nombre"]);
                                            ?>
                                        </div>
                                        <div class="col-3">
                                            <?php
                                            print($row["correo"]);
                                            ?>
                                        </div>
                                        <div class="col-3">
                                            <?php
                                            print($row["fechaReg"]);
                                            ?>
                                        </div>
                                        <div class="col-3">
                                            <?php
                                            print($row["direccion"]);
                                            ?>
                                        </div>
                                        <div class="col-12 mt-4">
                                            <a href="./php/accionEliminarUsuario.php?id=<?php
                                                                                        print($row["id"]);
                                                                                        ?>" class=" btn btn-danger">Eliminar Usuario</a>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                    }
                    // Si no ha entrado en la condición, se usa este interruptor para mostrar que no hay usuarios registrados en la BBDD
                    if (!$hayUsuarios) {
                        ?>
                        <a class="btn col-12 bg-primary mt-3 rounded text-white">
                            <div class="row">
                                <div class="col-12">No hay usuarios registrados</div>
                            </div>
                        </a>
                    <?php
                    }
                    ?>

                </div>
            </div>
        <?php } else { ?>
            <div class="col-12 text-center mt-5">
                <!-- Si no es administrador el usuario -->
                <h1>No tiene permisos para ver esto</h1>
            </div>
        <?php } ?>
    </main>
    <footer class="text-center text-white fixed-bottom bg-primary">
        <div class="text-center p-3">
            <a class="text-white">© 2023 Copyright: Libros Paco</a>
        </div>
    </footer>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>