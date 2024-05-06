<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrArT</title>
    <meta name="author" content="DAW109 - Marcos Daniel Rodríguez">
    <link rel="icon" href="<?php echo ROOT_URL ?>assets/images/logo.png" type="image/x-icon">
    <meta name="description"
          content="En esta página pueden encontrarse los usuarios apasionados por el arte para crear su propio catálogo y establecer intercambios con otros usuarios.">
    <!-- Vincula el archivo CSS de Bootstrap -->
    <link rel="stylesheet" href="<?php echo ROOT_URL ?>assets/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Vincula el archivo JS de Bootstrap -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Estilo para la imagen de fondo */
        .fullscreen-bg {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }

        .fullscreen-bg__img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 0;
        }

        /* Estilo para el botón */
        .center-btn {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
        }

        .logo {
            width: 50px;
            height: 50px;
        }
    </style>

<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo ROOT_URL ?>">
            <img class="logo"
                                                                   src="<?php echo ROOT_URL ?>assets/images/logo.png"
                                                                   alt="Logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <form class="d-flex col-2" action="<?php echo ROOT_URL; ?>shares/search" method="GET">
                <input class="form-control me-2" type="text" name="query" placeholder="Search">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
            <ul class="navbar-nav ms-auto">
                <?php if (isset($_SESSION['is_logged_in'])): ?>
                    <div class="d-flex align-items-center">
                        <div class="nav-item text-light">
                            Bienvenido <?php echo $_SESSION['user_data']['nombre']; ?>
                        </div>
                    </div>
                    <div class="collapse navbar-collapse position-static" id="navbarNavDarkDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink"
                                   role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Menú
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end"
                                    aria-labelledby="navbarDarkDropdownMenuLink">
                                    <li><a class="dropdown-item"
                                           href="<?php echo ROOT_URL . '/shares/indexUser/' . $_SESSION['user_data']['idusuario']; ?>"
                                        ><?php echo $_SESSION['user_data']['email'] ?></a></li>
                                    <li><a class="dropdown-item" href=<?php echo ROOT_URL . '/shares' ?>>Ir al
                                            catálogo</a></li>
                                    <li><a class="dropdown-item" href="<?php echo ROOT_URL; ?>users/logout">Cerrar
                                            sesión</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                <?php else: ?>
                    <!-- Resto del código para usuarios no autenticados -->
                    <li class="nav-item"><a class="nav-link" href="<?php echo ROOT_URL; ?>users/login">Identificarse</a>
                    </li>
                    <li class="nav-item"><a class="nav-link"
                                            href="<?php echo ROOT_URL; ?>users/register">Registrarse</a></li>
                <?php endif; ?>
            </ul>
        </div>


    </div>
</nav>


<?php messages::display(); ?>
<?php require $view; ?><!-- /.container -->
</body>

</html>