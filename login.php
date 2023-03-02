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
    <link rel="stylesheet" href="css/login.css">
</head>

<?php
$error = recoge("errorLogin");
?>

<body>
    <main>
        <div class="container-fluid mt-5 mb-5">
            <div class="row justify-content-center containerFormat">
                <form action="./php/accionLogin.php" class="rounded bg-primary p-4 text-white loginFormat align-self-center" method="POST">
                    <div class="mt-2 text-center">
                        <h1 class="display-6">Iniciar Sesión</h1>
                    </div>
                    <div class="mb-3 pt-4 ps-5 pe-5">
                        <label for="username" class="form-label">Nombre de usuario</label>
                        <input type="text" class="form-control" id="username" placeholder="Tu nombre de usuario" name="nombre">
                    </div>
                    <div class="mb-3 pt-4 ps-5 pe-5">
                        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Tu contraseña" name="password">
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-6 text-center">
                            <button type="submit" class="btn btn-success mt-5 buttonFormat me-sm-0 me-md-5">Iniciar
                                Sesión</button>
                        </div>
                        <div class="col-12 col-sm-6 text-center">
                            <a class="btn btn-success mt-5 buttonFormat" href="./register.php">Registrarse</a>
                        </div>
                        <?php
                        if ($error) {
                        ?>
                            <p class="text-center mt-3 p-1 bg-danger">Usuario o contraseña incorrectos</p>
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