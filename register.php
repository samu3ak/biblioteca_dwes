<?php
session_start();
include 'php/funciones.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Biblioteca</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/register.css">
</head>

<?php
$errorRegistro = recoge("errorRegistro");
$registrado = recoge("registrado");
?>

<body>
    <main>
        <div class="container-fluid mb-5">
            <div class="row justify-content-center containerFormat">
                <form action="./php/accionRegistro.php" class="rounded-3 bg-primary p-4 text-white registerFormat align-self-center" method="POST">
                    <div class="mt-2 text-center">
                        <h1 class="display-6">Registrarse</h1>
                    </div>
                    <div class="mb-3 pt-4 ps-5 pe-5">
                        <label for="username" class="form-label">Nombre de usuario</label>
                        <input type="text" class="form-control" id="username" placeholder="Elige tu nombre de usuario" name="nombre">
                    </div>
                    <div class="mb-3 pt-4 ps-5 pe-5">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="text" class="form-control" id="correo" placeholder="Escribe tu correo electrónico" name="correo">
                    </div>
                    <div class="mb-3 pt-4 ps-5 pe-5">
                        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Elige tu contraseña" name="password">
                    </div>
                    <div class="mb-3 pt-4 ps-5 pe-5">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="direccion" placeholder="Escribe tu dirección" name="direccion">
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-6 text-center">
                            <button type="submit" class="btn btn-success mt-5 buttonFormat me-sm-0 me-md-5 me-lg-5 me-xl-5">Completar
                                registro</button>
                        </div>
                        <div class="col-12 col-sm-6 text-center">
                            <a class="btn btn-success mt-5 buttonFormat" href="./index.php">Volver a Inicio</a>
                        </div>
                        <?php
                        if ($registrado) {
                        ?>
                            <p class="text-center mt-4 p-2 bg-success rounded">Usuario creado satisfactoriamente</p>
                        <?php
                        } elseif ($errorRegistro) {
                        ?>
                            <p class="text-center mt-4 p-2 bg-danger rounded">No ha introducido los datos correctamente</p>
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