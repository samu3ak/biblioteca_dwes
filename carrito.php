<?php
/*
* Este archio muestra los productos en una tabla.
*/
session_start();
$totalPagar = 0;
include "php/conexion.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
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
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12 mt-5">
                <h1 class="text-center">Carrito</h1>
                <a href="./index.php" class="btn btn-default text-center">Productos</a>
                <br><br>
                <?php
                /*
* Esta es la consula para obtener todos los productos de la base de datos.
*/
                $products = $db->query("select * from libros");
                if (isset($_SESSION["cart"]) && !empty($_SESSION["cart"])) :
                ?>
                    <table class="table table-bordered">
                        <thead>
                            <th>Cantidad</th>
                            <th>Producto</th>
                            <th>Precio Unitario</th>
                            <th>Total</th>
                            <th></th>
                        </thead>
                        <?php
                        /*
* Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
*/
                        foreach ($_SESSION["cart"] as $c) :
                            $products = $db->query("select * from libros where id=$c[product_id]");
                            $r = $products->fetch_object();
                            $totalPagar += $c["q"] * $r->Precio;
                        ?>
                            <tr>
                                <th><?php echo $c["q"]; ?></th>
                                <td><?php echo $r->Titulo; ?></td>
                                <td>$ <?php echo $r->Precio; ?></td>
                                <td>$ <?php echo $c["q"] * $r->Precio; ?></td>
                                <td style="width:260px;">
                                    <?php
                                    $found = false;
                                    foreach ($_SESSION["cart"] as $c) {
                                        if ($c["product_id"] == $r->id) {
                                            $found = true;
                                            break;
                                        }
                                    }
                                    ?>
                                    <a href="php/eliminarCarrito.php?id=<?php echo $c["product_id"]; ?>" class="btn btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <th></th>
                            <td></td>
                            <td></td>
                            <td>$ <?php echo $totalPagar; ?></td>
                            <td style="width:260px;">
                                <?php
                                $found = false;
                                foreach ($_SESSION["cart"] as $c) {
                                    if ($c["product_id"] == $r->id) {
                                        $found = true;
                                        break;
                                    }
                                }
                                ?>
                            </td>
                        </tr>
                    </table>

                    <form class="form-horizontal" method="post" action="./php/procesarCarrito.php">
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Procesar Venta</button>
                            </div>
                        </div>
                    </form>


                <?php else : ?>
                    <p class="alert alert-warning">El carrito esta vacio.</p>
                <?php endif; ?>

            </div>
        </div>
    </div>
    <footer class="text-center text-white fixed-bottom bg-primary">
        <div class="text-center p-3">
            <a class="text-white">© 2023 Copyright: Libros Paco</a>
        </div>
    </footer>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>